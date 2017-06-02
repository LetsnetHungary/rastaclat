<?php

	class Index_Model extends CoreApp\Model {
		public function __construct() {
			parent::__construct();
		}

		public function getFeaturedItems() {
			$names = CoreApp\CMS::getSection("Index", "featured_items");
			foreach ($names as $key => $value) {
				$featuredItemsNames[$key] = $value;
			}

			$featureditems = array();
			$featuredItemsNames = array_values($featuredItemsNames);

			for($i = 1; $i <= count($featuredItemsNames); $i++) {
				$query = "SELECT prod_id, prod_price, prod_name, outofstock FROM prods WHERE prod_id = :prod_id";
				$stmt = $this->db->prepare($query);
				$stmt->execute(array(
					":prod_id" => $featuredItemsNames[$i -1]
					));
				$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

				$featureditems[$i] =  $result;
			}
			return($featureditems);
		}
	}
