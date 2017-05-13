<?php

	class Viewmore_Model extends CoreApp\Model
	{
		public function __construct()
		{
			parent::__construct();
		}

		public function getData($prodid)
		{
			$stmt = $this->db->prepare("SELECT * FROM prod_prop WHERE prod_id = :prodid");
			$stmt->execute(array(

				":prodid" => $prodid

				));
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
			$result = json_encode($result);
			return($result);
		}
	}
