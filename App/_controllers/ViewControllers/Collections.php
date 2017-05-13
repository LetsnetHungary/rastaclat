<?php

  class Collections extends CoreApp\ViewController
  {
    public function __construct()
    {
      parent::__construct(__CLASS__);
      $this->v->collections = $this->model->getCollections();
    }
    public function showView($bool) {
			$this->viewDisplay($bool);
		}
  }
