<?php

	class Subscribe extends CoreApp\InnerController {
		public function __construct() {
			parent::__construct(__CLASS__);
		}

		public function subscribe() {
			if(isset($_POST))
			{
				if(isset($_POST["sub_name"]) && isset($_POST["sub_email"]))
				{
					$name = $_POST["sub_name"];
					$email = $_POST["sub_email"];
					$this->model->subscribe($name, $email);
				}
				else
				{
					echo "Sikertelen feliratkozás...";
				}
			}
			else
			{
				echo "Sikertelen feliratkozás...";
			}
		}

		public function category() {
			$this->model->category();
		}
	}
