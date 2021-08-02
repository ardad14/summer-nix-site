<?php

namespace App\Controller;

use Framework\Core\AbstractController\Controller;
use Framework\Authentication\Authentication;

class AuthenticationController extends Controller
{
    public function login()
    {
        $this->templeater->renderContent('Вход', 'login');
    }

    public function profile()
    {
        if (!$this->authentication->isAuth()) {
            header("location: ../login");
        }
        $this->templeater->renderContent('Профиль', 'profile', ["name" => $this->authentication->session->getKey("userName")] );

    }

    public function auth()
    {
        if ($this->authentication->auth($_POST["login"], $_POST["password"])) {
            header("location: ../profile");
        } else {
            header("location: ../login");
        }
    }

    public function logout()
    {
        $this->authentication = new Authentication();
        $this->authentication->logOut();
        header("location: ../login");
    }
}