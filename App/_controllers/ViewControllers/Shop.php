<?php

	class Shop extends CoreApp\ViewController {
		public function __construct() {
			parent::__construct(__CLASS__);
			$this->v->products = $this->model->getProducts();
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
			$this->v->products = $this->model->getProductsBy("Classic");
			$_GET["c"] = "CLASSIC";
		}

		public function Miniclat() {
			$this->v->products = $this->model->getProductsBy("Miniclat");
			$_GET["c"] = "MINICLAT";
		}

		public function Core() {
			$this->v->products = $this->model->getProductsBy("Classic Core");
			$_GET["c"] = "CLASSIC CORE";
		}

		public function Colorful() {
			$this->v->products = $this->model->getProductsBy("Classic Colorful");
			$_GET["c"] = "CLASSIC COLORFUL";
		}

		public function Knotaclat() {
			$this->v->products = $this->model->getProductsBy("Knotaclat");
			$_GET["c"] = "KNOTACLAT";
		}

		public function Limited() {
			$this->v->products = $this->model->getProductsBy("Limited");
			$_GET["c"] = "LIMITED";
		}
	}
