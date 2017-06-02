<?php

	class Shop extends CoreApp\ViewController {
		public function __construct() {
			parent::__construct(__CLASS__);
			$this->v->products = $this->model->getProductsBy('all');
			$_GET["c"] = "ÖSSZES";
			if(isset($_GET) && isset($_GET["c"])) {
				if(method_exists($this, $_GET["c"])) {
					$this->$_GET["c"]();
				}
			}
		}
		public function showView($bool) {
			$this->viewDisplay($bool);
		}

		public function Classic() {
			$this->v->products = $this->model->getProductsBy("classic");
			$_GET["c"] = "CLASSIC";
		}

		public function Miniclat() {
			$this->v->products = $this->model->getProductsBy("miniclat");
			$_GET["c"] = "MINICLAT";
		}

		public function Core() {
			$this->v->products = $this->model->getProductsBy("classiccore");
			$_GET["c"] = "CLASSIC CORE";
		}

		public function Colorful() {
			$this->v->products = $this->model->getProductsBy("classiccolorful");
			$_GET["c"] = "CLASSIC COLORFUL";
		}

		public function Knotaclat() {
			$this->v->products = $this->model->getProductsBy("knotaclat");
			$_GET["c"] = "KNOTACLAT";
		}

		public function Limited() {
			$this->v->products = $this->model->getProductsBy("limited");
			$_GET["c"] = "LIMITED";
		}
	}
