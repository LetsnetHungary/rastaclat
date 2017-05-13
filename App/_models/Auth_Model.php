<?php

    class Auth_Model extends CoreApp\Model
    {
        public function __construct()
        {
            parent::__construct();
        }

        public function getLocation($la, $lo)
        {
            //Send request and receive json data by latitude and longitude
            $url = 'http://maps.googleapis.com/maps/api/geocode/json?latlng='.trim($la).','.trim($lo).'&sensor=false';
            $json = @file_get_contents($url);
            $data = json_decode($json);
            $status = $data->status;
            if($status=="OK"){
                //Get address from json data
                $location = $data->results[0]->formatted_address;
            }
            else{
                $location =  "We're not able to get your position.";
            }
            //Print address
            echo $location;
        }

        public function login($e, $p, $data)
        {
            $au = new CoreApp\AttemptUser($e, $p);
            $au->prepareCredentials();
            $au->setLocation(trim($data["lalo"]));

            $a = new CoreApp\Controller\Authentication();
            $a->loginAttemptUser($au);
        }

        public function register($e, $p)
        {
            $au = new CoreApp\AttemptUser($e, $p, array());
            $a = new CoreApp\Controller\Authentication();
            $a->registerNewUserByEmail($au);
        }
    }
