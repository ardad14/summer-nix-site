<?php

namespace Framework\Core\Authentication;

class Authentication
{
    private const LOGIN = "admin";
    private const PASSWORD = "123";

    public function isAuth() : bool
    {
        return isset($_SESSION["userName"]);
    }

    public function auth($login, $pass) : bool
    {
        if($login === self::LOGIN && $pass === self::PASSWORD) {
            $_SESSION["userName"] = $login;
            return true;
        }
        return false;
    }

    public function getLogin(): ?string
    {
        return self::LOGIN;
    }

    public function logOut() : void
    {
        unset($_SESSION["userName"]);
    }

}