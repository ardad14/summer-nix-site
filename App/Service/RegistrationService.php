<?php

namespace App\Service;

use Framework\Core\Validator\Validator;
use Framework\Helpers\Exceptions\UserExceptions\EmailException;
use Framework\Helpers\Exceptions\UserExceptions\LoginException;
use Framework\Helpers\Exceptions\UserExceptions\NameException;
use Framework\Helpers\Exceptions\UserExceptions\NotConfirmPasswordException;
use Framework\Helpers\Exceptions\UserExceptions\PasswordException;
use Framework\Helpers\Exceptions\UserExceptions\PhoneException;
use Framework\Helpers\Exceptions\UserExceptions\SurnameException;

class RegistrationService
{
    private Validator $validator;
    private UserService $userService;

    public function __construct()
    {
        $this->validator = new Validator();
        $this->userService = new UserService();
    }

    public function registration(
        string $name,
        string $surname,
        string $email,
        string $phone,
        string $login,
        string $password,
        string $passwordRepeat
    ): bool {
        try {
            $this->validator->onRegistrationUser(
                $name,
                $surname,
                $email,
                $phone,
                $login,
                $password,
                $passwordRepeat
            );
        } catch (
            EmailException
            | PasswordException
            | LoginException
            | NameException
            | PhoneException
            | SurnameException
            | NotConfirmPasswordException $e
        ) {
            $this->validator->setRegistrationError($e);
            return false;
        }

        $this->userService->setNewUser(
            $name,
            $surname,
            $email,
            $phone,
            $login,
            $password
        );
        return true;
    }
}
