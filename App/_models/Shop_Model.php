<?php

	class Shop_Model extends CoreApp\Model
	{
		public function __construct()
		{
			parent::__construct();
		}

		public function getProducts()
		{
			/*
			$b = array();
			$bracelets = CoreApp\CMS::getSection("shop", "items");
			foreach ($bracelets as $key => $value) {
				$stmt = $this->db->prepare("SELECT *, products.webshop_stock FROM prod_prop INNER JOIN products ON (prod_prop.prod_id=products.prod_id) WHERE prod_prop.prod_id = :prod_id");
				$stmt->execute(array(
					":prod_id" => $value
				));
				$bracelet = $stmt->fetchAll(PDO::FETCH_ASSOC);
				array_push($b, $bracelet);
			}


			$json_bracelet = json_decode(json_encode($b));
			$bracelets = array();

			foreach($json_bracelet as $key => $value) {
				foreach ($value as $id => $inner) {
					array_push($bracelets, $inner);
				}
			}
			$bracelets = json_decode(json_encode($bracelets), true);

			*/

			$stmt = $this->db->prepare("SELECT products.prod_id, products.webshop_stock, prod_prop.type, prod_prop.price, prod_prop.name FROM products INNER JOIN prod_prop ON (products.prod_id = prod_prop.prod_id) INNER JOIN category ON (products.prod_id = category.prod_id) WHERE category.category = :category ORDER BY category.position");
			$stmt->execute(array(
				":category" => "all"
			));
			return $stmt->fetchAll(PDO::FETCH_ASSOC);
		}

		public function getProductsBy($by) {
			$stmt = $this->db->prepare("SELECT products.prod_id, products.webshop_stock, prod_prop.type, prod_prop.price, prod_prop.name FROM products INNER JOIN prod_prop ON (products.prod_id = prod_prop.prod_id) INNER JOIN category ON (products.prod_id = category.prod_id) WHERE category.category = :category ORDER BY category.position");
			$stmt->execute(array(
				":category" => $by
			));
			return $stmt->fetchAll(PDO::FETCH_ASSOC);
		}
	}
