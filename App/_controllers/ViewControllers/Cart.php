<?php
	class Cart extends CoreApp\ViewController
	{
		public function __construct()
		{
			parent::__construct(__CLASS__);
			$this->v->data = Controller\InnerCart::getCart();
			$this->v->fullPrice = Controller\InnerCart::fullprice();
		}
		public function showView($bool) {
			$this->viewDisplay($bool);
		}
	}
