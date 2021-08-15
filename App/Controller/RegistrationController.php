<?php

namespace App\Controller;

use Framework\Core\AbstractController\Controller;
use App\Service\RegistrationService;

class RegistrationController extends Controller
{
    public function registration()
    {
        $this->templeater->renderContent(
            'Регистрация',
            'registration'
        );
    }

    public function verification()
    {
        $registrationService = new RegistrationService();
        $result = $registrationService->registration(
            $_POST['name'],
            $_POST['surname'],
            $_POST['email'],
            $_POST['phone'],
            $_POST['login'],
            $_POST['password'],
            $_POST['confirm']
        );

        if ($result) {
            header("location: ../login");
        } else {
            header("location: ../registration");
        }
    }
}
