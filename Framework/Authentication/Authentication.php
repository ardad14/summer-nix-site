<?php

namespace Framework\Authentication;

use Framework\Session\Session;

class Authentication
{
    private const LOGIN = "admin";
    private const PASSWORD = "123";
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
        if($login === self::LOGIN && $pass === self::PASSWORD) {
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
        return self::LOGIN;
    }

    public function logOut() : void
    {
        $this->session->deleteKey("userName");
    }

}