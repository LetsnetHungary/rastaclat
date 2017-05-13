<?php
	class Index extends CoreApp\ViewController
	{
		public function __construct()
		{
			parent::__construct(__CLASS__);
			$this->v->featuredItems = $this->model->getFeaturedItems();
			$this->v->promotion = CoreApp\CMS::getSection(__CLASS__, "promotion");
			$this->model = null; //set the DB connection to null
		}

		public function showView($b) {
			$this->viewDisplay($b);
		}

		/*
		public function modelDidLoad() {
			echo "<br> model loaded<br> ";
		}

		public function viewRenderEnded() {
			echo "<br>render ended";
		}
		*/
	}
