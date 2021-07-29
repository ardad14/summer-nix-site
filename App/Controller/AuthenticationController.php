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
        if (empty($_SESSION['userName'])) {
            header("location: ../login");
        }
        $this->templeater->renderContent('Профиль', 'profile');
    }

    public function auth()
    {
        if($this->authentication->auth($_POST["login"], $_POST["password"])) {
            unset($_SESSION['wrongCredentials']);
            header("location: ../profile");
        } else {
            $_SESSION['wrongCredentials'] = '
                <div class="alert alert-danger" role="alert">
                    <b>Wrong credentials! </b>
                </div>';
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