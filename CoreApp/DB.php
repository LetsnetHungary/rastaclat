<?php
namespace CoreApp;

    use \PDO;

    class DB extends PDO {

        public static function monthTable($dbname, $tablename) {

            $dbconfig = AppConfig::dbConfig();

            if($dbname) {
                $dbconfig->DB_NAME = $dbname;
            }
            $this->config->DB_NAME = !empty($db) ? $db : $this->config->DB_NAME;
  				$pdo = $this->config->DB_TYPE.":host=". $this->config->DB_HOST.";port=".$this->config->DB_PORT.";dbname=".$this->config->DB_NAME;


            $db = new PDO($pdo, $dbconfig->DB_USER, $dbconfig->DB_PASS);

            $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "CREATE TABLE IF NOT EXISTS `$tablename` (
              `id` int(255) AUTO_INCREMENT PRIMARY KEY,
              `ip` varchar(40) NOT NULL,
              `conntime` int(40) NOT NULL,
              `connday` varchar(40) NOT NULL,
              `url` varchar(100) NOT NULL,
              `useragent` varchar(1000) NOT NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=latin1;" ;

             $db->exec($sql);
        }
    }
