<?php

	class Subscribe_Model extends CoreApp\Model
	{
		public function __construct()
		{
			parent::__construct();
		}

		public function category() {
			$stmt = $this->db->prepare("SELECT * FROM category");
			$stmt->execute();
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

			for($i =0 ; $i < count($result); $i++) {
				$stmt = $this->db->prepare("INSERT INTO category (prod_id, category, position) VALUES (:prod_id, :category, :position)");
				$stmt->execute(array(
					":prod_id" => $result[$i]["prod_id"],
					":category" => "all",
					":position" => "0"
				));
			}
		}

		public function subscribe($name, $email)
		{
			if(!$this->checkIfAlreadySubscribed($email))
			{
				try
				{
					$stmt = $this->db->prepare("INSERT INTO subscribe (datee, name, email, subtime, url, ip, useragent) VALUES (:datee, :name, :email, :subtime, :url, :ip, :useragent)");

					$stmt->execute(array(

						":datee" => date("F j, Y, g:i a"),
						":name" => $name,
						":email" => $email,
						":subtime" => time(),
						":url" => $_SERVER["REQUEST_URI"],
						":ip" => $_SERVER["REMOTE_ADDR"],
						":useragent" => $_SERVER["HTTP_USER_AGENT"],

						));

					echo "Sikeres feliratkozás !";
				}
				catch(Exception $e)
				{
					echo "Hiba történt! (2)";
				}
			}
			else
			{
				echo "Ez az email cím már foglalt! (1)";
			}
		}

		public function checkIfAlreadySubscribed($email)
		{
			$stmt = $this->db->prepare("SELECT * FROM subscribe WHERE email = :email");
			$stmt->execute(array(

				":email" => $email

				));
			if($result = $stmt->fetchAll(PDO::FETCH_ASSOC))
			{
				return true;
			}
			else
			{
				return false;
			}
		}
	}
