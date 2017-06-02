<?php

	class Shop_Model extends CoreApp\Model
	{
		public function __construct()
		{
			parent::__construct();
		}

		public function getProductsBy($by) {
			$stmt = $this->db->prepare("SELECT * FROM prods INNER JOIN category_position ON (prods.prod_id = category_position.prod_id) WHERE category_position.category = :category AND prods.outofstock = :outofstock ORDER BY category_position.position");
			$stmt->execute(array(
				":category" => $by,
				":outofstock" => '0'
			));
			return $stmt->fetchAll(PDO::FETCH_ASSOC);
		}
	}
