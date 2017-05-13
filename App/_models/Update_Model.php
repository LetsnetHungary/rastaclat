<?php
    class Update_Model extends CoreApp\Model {

        public function __construct() {
            parent::__construct();
            $this->db->exec("use ".CoreApp\Appconfig::getCMSDB());
        }

        public function updateCMS() {
          $sections = $this->getSectionsByMaps();
          $c_sections = count($sections);
          for($i = 0; $i < $c_sections; $i++) {
            $this->db->exec("use ".CoreApp\Appconfig::getCMSDB());
            switch ($sections[$i]["type"]) {
              case 'text':
                $this->updateText($sections[$i]);
                break;
              case 'imageset':
                $this->updateImageSet($sections[$i]);
                break;
              case 'itemset':
                //$this->updateItemSet($sections[$i]);
                break;

              default:
                # code...
                break;
            }
          }
        }

        // GET ALL THE SECTIONS
        private function getSectionsByMaps() {
          $stmt = $this->db->prepare("SELECT section_map.view, section_map.section, section_map.type, section_map.uniquekey FROM section_map INNER JOIN cms_map ON (cms_map.cms_map_id = section_map.cms_map_id) GROUP BY section_map.section");
          $stmt->execute();
          $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
          $stmt = "";
          return $result;
        }

        // IMAGE UPDATE FUNCTION
        private function updateImage($section) {
          $oldjson = CoreApp\CMS::getSection($section["view"], $section["section"]);
          $stmt = $this->db->prepare("SELECT image_id, type FROM cms_image WHERE view = :view AND section = :section");
          $stmt->execute(array(
            ":view" => $section["view"],
            ":section" => $section["section"]
          ));
          $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

          print_r($oldjson);

          foreach ($oldjson as $key => $value) {
            if($key == $result[0]["image_id"]) {
              return;
            }
            else {
              $type = explode("/", $result[0]["type"]);
              $data = $this->getImageFROMDB($result[0]["image_id"]);
              $this->uploadImage($section["view"], $section["section"], $result[0]["image_id"], $type[1], $data);
            }
          }
          $json = array();
          $json[$result[0]["image_id"]] = "_cms/_img/".$section["view"]."/".$section["section"]."/".$result[0]["image_id"].".".$type[1];
          $json = json_encode($json);
          $this->updateJSON($section["view"], $section["section"], $json);
        }

        // TEXT UPDATE FUNCTION
        private function updateText($section) {
          $json = $this->getOldTexts($section["view"], $section["section"]);
          $this->updateJSON($section["view"], $section["section"], $json);
        }

        private function getOldTexts($view, $section) {
          $stmt = $this->db->prepare("SELECT cms_texts.defaultkey, cms_texts.innerkey, cms_texts.value FROM cms_texts WHERE view = :view AND section = :section");
          $stmt->execute(array(
            ":view" => $view,
            ":section" => $section
          ));
          if($result = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
            $json = array();
            $c_result = count($result);
            for($i = 0; $i < $c_result; $i++) {
              if($result[$i]["innerkey"] == "---") {
                $json[$result[$i]["defaultkey"]] = $result[$i]["value"];
                continue;
              }
              else {
                $stmt = $this->db->prepare("SELECT value FROM cms_texts WHERE defaultkey = :defaultkey AND innerkey = :innerkey");
                $stmt->execute(array(
                  ":defaultkey" => $result[$i]["defaultkey"],
                  ":innerkey" => $result[$i]["innerkey"]
                ));
                if($innerval = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
                  $json[$result[$i]["defaultkey"]][$result[$i]["innerkey"]] = $innerval[0]["value"];
                }
              }
            }
            return $json;
          }
          return array();
        }

        // IMAGESET UPDATE FUNCTION
        private function updateImageSet($section) {
          $stmt = $this->db->prepare("SELECT image_id, type FROM cms_image WHERE view = :view AND section = :section ORDER BY position");
          $stmt->execute(array(
            ":view" => $section["view"],
            ":section" => $section["section"]
          ));

          $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
          $c_result = count($result);

          $oldimages = CoreApp\CMS::getSection($section["view"], $section["section"]);

          $k = 0;
          $old_images = array();

          foreach($oldimages as $key => $value) {
            $old_images[$k] = array();
            $old_images[$k][$key] = $value;
            $k++;
          }
          $json = array();



          for($i = 0; $i < $c_result;$i++) {
            if($result[$i]["image_id"] == $old_records[$i]["image_id"]) {
              continue;
            }
            else {
              $type = explode("/", $result[$i]["type"]);
              $data = $this->getImageFROMDB($result[$i]["image_id"]);
              $this->uploadImage($section["view"], $section["section"], $result[$i]["image_id"], $type[1], $data);
            }
            $json[$result[$i]["image_id"]] = "_cms/_img/".$section["view"]."/".$section["section"]."/".$result[$i]["image_id"].".".$type[1];
          }
          $json = json_encode($json);

          $this->updateJSON($section["view"], $section["section"], $json);
        }

        // ITEMSET UPDATE FUNCTION
        private function updateItemSet($section) {
          $stmt = $this->db->prepare("SELECT cms_items.productkey, cms_item_prop.innerkey, cms_item_prop.value, cms_item_image.type FROM cms_item_prop INNER JOIN cms_items ON (cms_items.productkey = cms_item_prop.defaultkey) INNER JOIN cms_item_image ON (cms_items.productkey = cms_item_image.image_id) WHERE cms_items.view = :view AND cms_items.section = :section ORDER BY cms_items.position");
          $stmt->execute(array(
            ":view" => $section["view"],
            ":section" => $section["section"]
          ));
          $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
          $olditems = array_values(json_decode(json_encode(CoreApp\CMS::getSection($section["view"], $section["section"])), true));

          $c_result = count($result);
          $json = array();
          for($i = 0; $i < $c_result; $i++) {
            $json[$result[$i]["productkey"]]["itemid"] = $result[$i]["productkey"];
            $json[$result[$i]["productkey"]]["properties"][$result[$i]["innerkey"]] = $result[$i]["value"];
            $type = explode("/", $result[$i]["type"]);
            $json[$result[$i]["productkey"]]["image"] = "_cms/_img/".$section["view"]."/".$section["section"]."/".$result[$i]["productkey"].".".$type[1];
          }
          $jsonav = array_values($json);
          $json = json_encode($json);
          $c_jsonav = count($jsonav);

          for($i = 0; $i < $c_jsonav; $i++) {
            if($jsonav[$i]["itemid"] == $olditems[$i]["itemid"]) {
              continue;
            }
            else {
              $data = $this->getImageFROMDB($jsonav[$i]["itemid"]);
              $type = explode("/", $result[$i]["type"]);
              $this->uploadImage($section["view"], $section["section"], $jsonav[$i]["itemid"], $type[1], $data);
            }
          }

/*
          if($section["view"] == "Shop" && $section["section"] == "bracelets") {
            $this->uploadProducts($jsonav);
          }
*/
          $this->updateJSON($section["view"], $section["section"], $json);
        }

        // UPLOAD THE PRODUCTS
        private function uploadProducts($records) {
          $this->db->exec("use rastaclat");
          $c_records = count($records);
          for($i = 0; $i < $c_records; $i++) {
            $stmt = $this->db->prepare("INSERT INTO products (prod_id) VALUES (:prod_id)");
            $stmt->execute(array(
              ":prod_id" => $records[$i]["itemid"]
            ));
            $properties = json_decode(json_encode($records[$i]["properties"]));
            $stmt = $this->db->prepare("INSERT INTO prod_prop (prod_id, ord, price, type, name, prod_name, prop1, prop2, prop3, prop4, prop5, prop6) VALUES (:prod_id, :ord, :price, :type, :name, :prod_name, :prop1, :prop2, :prop3, :prop4, :prop5, :prop6)");
            $stmt->execute(array(
              ":prod_id" => $records[$i]["itemid"],
              ":ord" => $i,
              ":price" => $records[$i]["properties"]["price"],
              ":type" => $records[$i]["properties"]["category"],
              ":name" => $records[$i]["properties"]["name"],
              ":prod_name" => $records[$i]["properties"]["category"]." ".$records[$i]["properties"]["name"],
              ":prop1" => $records[$i]["properties"]["coll"],
              ":prop2" => $records[$i]["properties"]["anyag"],
              ":prop3" => $records[$i]["properties"]["leiras"],
              ":prop4" => $records[$i]["properties"]["meret"],
              ":prop5" => $records[$i]["properties"]["javaslat"],
              ":prop6" => "0"
            ));
          }
        }

        // GETTING THE IMAGE IF NEEDED
        private function getImageFROMDB($image_id) {
          $stmt = $this->db->prepare("SELECT data FROM cms_image WHERE image_id = :image_id");
          $stmt->execute(array(
            ":image_id" => $image_id
          ));
          $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
          return $result[0]["data"];
        }

        // GETTING THE IMAGE IF NEEDED
        private function getImageFROMItemDB($image_id) {
          $stmt = $this->db->prepare("SELECT data FROM cms_item_image WHERE image_id = :image_id");
          $stmt->execute(array(
            ":image_id" => $image_id
          ));
          $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
          return $result[0]["data"];
        }

        // UPLOAD/UPDATE THE IMAGE TO THE SERVER
        private function uploadImage($view, $section, $image_id, $type, $data) {
          $dir_path = "_cms/_img/$view/$section";
          $path = "_cms/_img/$view/$section/$image_id.$type";
          createDir($dir_path);
          $data = base64_decode($data);
          file_put_contents($path, $data);
        }

        //UPDATE THE JSON FILE
        private function updateJSON($view, $section, $json){
          if(is_array($json) || is_object($json)) {
            $json = json_encode($json);
          }
          $json_path = "_cms/_jsons/$view/$section.json";
          $f = fopen($json_path, "w");
          fwrite($f, $json);
        }
    }
