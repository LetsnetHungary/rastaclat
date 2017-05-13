<?php

	class UserCart_Model extends CoreApp\Model
	{
		public function __construct()
		{
			parent::__construct();

			CoreApp\Session::init();
			if($this->checkCart())
			{
				return;
			}
			else
			{
				$this->setCart();
			}
		}

		public function addToCart($prodid)
		{
			$stmt = $this->db->prepare("SELECT prod_id, name, type, price FROM prod_prop WHERE prod_id = :prod_id");
			$stmt->execute(
				array(

					":prod_id" => $prodid

				));
			if($result = $stmt->fetchAll(PDO::FETCH_ASSOC))
			{
				$result[0]["count"] = 1;
				for($i = 0; $i < count($_SESSION["cart"]); $i++)
				{
					if($result[0]["prod_id"] == $_SESSION['cart'][$i]["prod_id"])
					{
	                   $_SESSION['cart'][$i]["count"] += 1;
	                   print_r($_SESSION);
	                   return;
	               	}
				}
				array_push($_SESSION["cart"], $result[0]);
			}
			else
			{
				echo "Nincs ilyen termék az adatbázisban.";
			}
		}

		public function removeCart()
		{
	        $_SESSION['cart'] = array();
	    }

	    public function removeFromCart($prodid)
	    {
	        $cartNum = count($_SESSION['cart']);
	        for($i = 0; $i < $cartNum; $i++)
	        {
	            if($prodid == $_SESSION['cart'][$i]["prod_id"]){
					if($cartNum > 1){
						unset($_SESSION['cart'][$i]);
						$_SESSION['cart']=array_values($_SESSION['cart']);
					}
					else
					{
						unset($_SESSION['cart']);
					}
	           }
	        }
   	    }

	    public function freshCount($prodid, $count)
	    {
	        for($i=0; $i < count($_SESSION["cart"]); $i++)
	        {
	            if($prodid == rtrim($_SESSION["cart"][$i]["prod_id"])) {
	                $_SESSION["cart"][$i]["count"] = $count;
	            }
	        }
	    }

	    public function getCart()
	    {
	    	return($_SESSION["cart"]);
	    }

		private function checkCart()
		{
	        if(isset($_SESSION['cart']) && is_array($_SESSION['cart']))
	        {
	           return true;
	        }
	        else
	        {
	           return false;
	        }
	    }

	    private function setCart(){
	        try
	        {
	            $_SESSION['cart'] = array();
	            return true;
	        }
	        catch(Exception $ex)
	        {
	            return false;
	        }
	    }

	    public function uploadOrder($customerdata, $paytype, $pdata, $afa)
	    {
	    	$cart = array();

	    	$cart = $this->getCartJson();

	    	$query = "INSERT INTO neworders (buy_id, useragent, datee, year, month, day, name, email, phone, birth, postcode, address, afa, afaname, afaaddress, afadata, type, pickpackdata, state, visible, cart) VALUES (:buy_id, :useragent, :datee, :year, :month, :day, :name, :email, :phone, :birth, :postcode, :address, :afa, :afaname, :afaaddress, :afadata, :type, :pickpackdata, :state, :visible, :cart)";

	    	$stmt = $this->db->prepare($query);

	    	try
	    	{
	    		$stmt->execute(array(

	    				":buy_id" => time() . "_" .$_SERVER["REMOTE_ADDR"],
	    				":useragent" => $_SERVER["HTTP_USER_AGENT"],
	    				":datee" => date("F j, Y, g:i a"),
	    				":year" => date("Y"),
	    				":month" => date("m"),
	    				":day" => date("d"),
	    				":name" => $customerdata["name"],
	    				":email" => $customerdata["email"],
	    				":phone" => $customerdata["phone"],
	    				":birth" => $customerdata["birth"],
	    				":postcode" => 0,
	    				":address" => $customerdata["address"],
	    				":afa" => $afa["got"],
	    				":afaname" => $afa["name"],
	    				":afaaddress" => $afa["address"],
	    				":afadata" => $afa["other"],
	    				":type" => $paytype,
	    				":pickpackdata" => $pdata,
	    				":state" => "0",
							":visible" => "1",
	    				":cart" => json_encode($cart)

	    			));

						if($paytype == "Pick Pack Pont")
						{
							echo("Gratulálunk! <br>Rendelésedet regisztráltuk. 3-8 munkanapon belül az általad választott Pick Pack Pontra leszállítjuk az árut. Sms-ben fogunk értesíteni, ha a csomagod megérkezett az átvevőpontra.");
						}
						else if($paytype == "Személyes Átvétel")
						{
							echo("Gratulálunk! <br>Rendelésedet regisztráltuk. 2 munkanapon belül fogunk keresni telefonon és megbeszéljük a csomagod átvételéhez szükséges tudnivalókat.");
						}
						else
						{
							echo("Sikertelen rendelés!");
						}
	    	}
	    	catch(Exception $e)
	    	{
	    		print_r($e);
	    	}

				$message1 = "Gratulálunk! Rendelésedet regisztráltuk. 2 munkanapon belül fogunk keresni telefonon és megbeszéljük a csomagod átvételéhez szükséges tudnivalókat.";

				$message2 = "Gratulálunk! Rendelésedet regisztráltuk. 3-8 munkanapon belül az általad választott Pick Pack Pontra leszállítjuk az árut. Sms-ben fogunk értesíteni, ha a csomagod megérkezett az átvevőpontra.";

				if($paytype == "Pick Pack Pont") {
					$message = $message2;
				}
				else {
					$message = $message1;
				}

				$mail = new CoreApp\Mail($customerdata["email"], "info@rastaclat.hu", "Rastaclat Rendelés", $message, "");
				$mail->from = "info@rastaclat.hu";
				$mail->to = $customerdata["email"];
				$mail->send();

	    	$this->setWebshopStocks($cart);
	    }


	    private function getCartJson()
	    {
	    	$cart = $_SESSION["cart"];
	    	$usercart = array();
	    	$count = count($_SESSION["cart"]);
	    	for($i = 0; $i < $count; $i++)
	    	{
	    		$stmt = $this->db->prepare("SELECT prod_id, prod_name, price, type FROM prod_prop WHERE prod_id = :prod_id");
	    		$stmt->execute(array(
	    				":prod_id" => $cart[$i]["prod_id"]
	    		));
	    		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
	    		array_push($usercart, $result[0]);
	    		$usercart[$i]["count"] = $cart[$i]["count"];
	    	}
	    	CoreApp\Session::unnset("cart");
	    	return $usercart;
	    }

	    private function setWebshopStocks($cart)
	    {
	    	$count = count($cart);
	    	for($i = 0; $i < $count; $i++)
	    	{
	    		$stmt = $this->db->prepare("UPDATE products SET on_stock = on_stock - ".$cart[$i]['count'].", webshop_stock = webshop_stock - ".$cart[$i]['count'].", webshop_sold = webshop_sold + ".$cart[$i]['count']." WHERE prod_id = :prod_id");
	    		$stmt->execute(array(

	    			":prod_id" => $cart[$i]["prod_id"]
    			));
	    	}
	    }
	}
