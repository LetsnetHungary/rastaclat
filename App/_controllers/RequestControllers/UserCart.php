<?php

	class UserCart extends CoreApp\InnerController
	{
		public function __construct()
		{
			parent::__construct(__CLASS__);
			if(isset($_POST["prodid"]))
			{
				$this->id = $_POST["prodid"];
			}
			if(isset($_POST["count"]))
			{
				$this->count = $_POST["count"];
			}
		}

		public function addToCart()
		{
			$this->model->addToCart($this->id);
		}

		public function freshCount()
		{
			if(isset($_POST["prodid"]) && isset($_POST["count"]))
			{
				echo $this->model->freshCount($this->id, $this->count);
			}
		}

		public function removeCart()
		{
			$this->model->removeCart();
		}

		public function removeFromCart()
		{
			if(isset($_POST["prodid"]))
			{
			  $this->model->removeFromCart($this->id);
			}
		}

		public function buy()
		{
			if(isset($_POST))
			{
				if($_POST["privacy"] && $_POST["terms"])
				{
					$customerdata = $_POST["customerdata"];
					$paytype = $_POST["paytype"];
					$pdata = $_POST["pdata"];
					$afa = $_POST["afa"];

					$this->model->uploadOrder($customerdata, $paytype, $pdata, $afa);
				}
				else
				{
					echo "Nem érvényes vásárlás!";
				}
			}
			else
			{
				echo "Nem érvényes vásárlás!";
			}
		}
	}
