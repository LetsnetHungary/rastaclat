<?php

  class Roots extends CoreApp\ViewController
  {
    public function __construct()
    {
      parent::__construct(__CLASS__);
    }
    public function showView($bool) {
			$this->viewDisplay($bool);
		}
  }
