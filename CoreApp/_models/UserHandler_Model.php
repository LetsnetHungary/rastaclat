<?php

namespace CoreApp\Model;
use \CoreApp;
use \PDO;

	class UserHandler_Model extends CoreApp\Model {

		public function __construct() {
			parent::__construct();
			CoreApp\Session::init();
			$this->logged_user = CoreApp\Session::get("logged_user");
		}

		public function getUserData() {
			$stmt = $this->db->prepare("SELECT userDatas.firstname, userDatas.lastname, userDatas.shopname, userDatas.status FROM userDatas INNER JOIN users ON (users.uniquekey = userDatas.uniquekey) WHERE users.email = :email");
			$stmt->execute(array(
				":email" => $this->logged_user
			));

			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
			return($result[0]);
		}

		public function getUserModules() {
			$stmt = $this->db->prepare("SELECT modules.name, modules.redirect, modules.icon, modules.lmodule FROM modules INNER JOIN users ON (users.sitekey = modules.sitekey AND users.adminkey = modules.adminkey AND users.allow = modules.allow OR users.sitekey = modules.sitekey AND modules.allow = 'all') WHERE users.email = :email");
			$stmt->execute(array(
				":email" => $this->logged_user
			));

			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
			return($result);
		}

	}
