<?php

class Authentication extends CoreApp\InnerController
{
    public function __construct()
    {
        parent::__construct(__CLASS__);
    }

    public function checkIfUserLoggedIn()
    {
        return $this->model->checkIfUserLoggedIn();
    }

    public function loginAttemptUser(AttemptUser $a)
    {
        if($this->model->loginAttemptUser($a))
        {
        }
    }

    public function registerNewUserByEmail(AttemptUser $a)
    {
        $this->model->registerNewUserByEmail($a);
    }
}
