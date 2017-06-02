<?php

	class productsapi extends CoreApp\InnerController {
		public function __construct() {
			parent::__construct(__CLASS__);
		}

		public function uploadImage() {
            echo "bsfdhbasldbfasdflahsdbflasd";
            $p = $_POST;
            $prodid = $p["prodid"];
            $records = $p["records"];
            $this->model->uploadImage($prodid, $records);  
        }
	}
