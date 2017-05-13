<?php

	class Viewmore extends CoreApp\InnerController
	{
		public function __construct()
		{
			parent::__construct(__CLASS__);

			if(isset($_POST["prodid"]))
			{
				$id = $_POST["prodid"];
				print_r($this->model->getData($id));
			}
		}
	}
