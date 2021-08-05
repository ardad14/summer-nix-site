<?php

namespace Framework\Authentication;

use Framework\Session\Session;
use App\Service\UserService;

class Authentication
{
    private $login;
    public Session $session;

    public function __construct()
    {
        $this->session = Session::getInstance();
    }

    public function isAuth() : bool
    {
        return $this->session->containsKey("userName");
    }

    public function auth($login, $pass) : bool
    {
        $userService = new UserService();
        $user = $userService->getByLogin($login);
        if($user != null && $pass === $user[0]->getPassword()) {
            $this->session->setKey("userName", $login);
            $this->session->deleteKey("wrongCredentials");
            return true;
        } else {
            $this->session->setKey("wrongCredentials",
                '<div class="alert alert-danger" role="alert">
                    <b>Wrong credentials! </b>
                </div>');
            return false;
        }
    }

    public function getLogin(): ?string
    {
        return $this->login;
    }

    public function logOut() : void
    {
        $this->session->deleteKey("userName");
    }

}