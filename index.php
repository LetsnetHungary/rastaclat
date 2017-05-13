<?php
require_once("vendor/autoload.php");

$timezone = CoreApp\AppConfig::getTimeZone();
date_default_timezone_set($timezone);

$debug = CoreApp\AppConfig::getDebug();
define("DEBUG", $debug);


//$analytics = new CoreApp\Controller\Analytics();

$url = isset($_GET["url"]) ? $_GET["url"] : "";
$app = new CoreApp\App($url);
$app->build();
?>
