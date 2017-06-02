<?php
namespace Controller;
use \CoreApp;
  class InnerCart extends CoreApp\InnerController
  {
    public static function getCart()
    {
      CoreApp\Session::init();
      if(isset($_SESSION["cart"]))
      {
        return($_SESSION["cart"]);
      }
    }

    public static function fullPrice()
    {
      CoreApp\Session::init();
      $price = 0;
      if(isset($_SESSION["cart"]))
      {
        for($i = 0; $i < count($_SESSION["cart"]); $i++)
        {
          $price += $_SESSION["cart"][$i]["count"] * $_SESSION["cart"][$i]["prod_price"] * 1000;
        }
        return($price);
      }
    }
  }
