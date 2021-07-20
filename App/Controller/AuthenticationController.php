<?php

namespace App\Controller;

use Framework\Core\AbstractController\Controller;

class AuthenticationController extends Controller
{
    public function login()
    {
        $this->templeater->renderContent('Вход', 'login');
    }
}