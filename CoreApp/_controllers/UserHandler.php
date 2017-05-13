<?php

namespace CoreApp\Controller;
use \CoreApp;

	class UserHandler extends CoreApp\InnerController {

		public function __construct() {
		    parent::__construct($this->ClassName(__CLASS__));
		}

    public function getModules() {
      return $this->model->getUserModules();
    }

    public function getData() {
      return $this->model->getUserData();
    }

		/*
		public function modelDidLoad()
		{
			echo "model loaded <br>";
		}
		*/
	}
