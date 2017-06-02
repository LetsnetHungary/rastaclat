<?php

	class productsapi_Model extends CoreApp\Model {
		public function __construct() {
			parent::__construct();
		}

        public function uploadImage($prodid, $records) {
            $c_r = count($records);
            if($c_r > 0) {
                if($records[0]["imagetype"] == "new") {
                $type = explode("/", $records[0]["type"]);
                $src = "_cms/$sitekey/_img/Products/".$prodid;
                
                createDir($src);
                $data = base64_decode($records[0]["data"]);
                $src = "_cms/$sitekey/_img/Products/".$prodid."/1.$type[1]";
                file_put_contents($src, $data);
                }
            } 
        }
	}
