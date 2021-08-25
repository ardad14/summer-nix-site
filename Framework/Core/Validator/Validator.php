<?php

namespace Framework\Core\Validator;

use Framework\Helpers\Exceptions\UserExceptions;
use Framework\Session\Session;

class Validator
{
    private const NAME_REGEX = '/\w{3,}/';
    private const EMAIL_REGEX = '/\w+@\w+\.\w+/';
    private const PHONE_REGEX = '/\+?\d{1,3}?[- .]?\(?(?:\d{2,3})\)?[- .]?\d\d\d[- .]?\d\d\d\d/';
    private const PASSWORD_REGEX = '/[a-zA-Z0-9]/';
    private const LOGIN_REGEX = '/[a-zA-Z0-9]/';
    private Session $session;

    public function __construct()
    {
        $this->session = Session::getInstance();
    }

    /**
     * @throws UserExceptions\PasswordException
     * @throws UserExceptions\EmailException
     * @throws UserExceptions\LoginException
     * @throws UserExceptions\SurnameException
     * @throws UserExceptions\NameException
     * @throws UserExceptions\PhoneException
     * @throws UserExceptions\NotConfirmPasswordException
     */
    public function onRegistrationUser(
        string $name,
        string $surname,
        string $email,
        string $phone,
        string $login,
        string $password,
        string $passwordConfirm
    ): void {
        switch (true) {
            case preg_match(self::NAME_REGEX, $name) !== 1:
                throw new UserExceptions\NameException();

            case preg_match(self::NAME_REGEX, $surname) !== 1:
                throw new UserExceptions\SurnameException();

            case preg_match(self::EMAIL_REGEX, $email) !== 1:
                throw new UserExceptions\EmailException();

            case preg_match(self::PHONE_REGEX, $phone) !== 1:
                throw new UserExceptions\PhoneException();

            case preg_match(self::LOGIN_REGEX, $login) !== 1:
                throw new UserExceptions\LoginException();

            case preg_match(self::PASSWORD_REGEX, $password) !== 1:
                throw new UserExceptions\PasswordException();

            case $password !== $passwordConfirm:
                throw new UserExceptions\NotConfirmPasswordException();
        }
    }

    public function setLoginError(): void
    {
        $this->session->setKey(
            "wrongCredentials",
            '<div class="alert alert-danger" role="alert">
                <b>Wrong credentials!</b>
            </div>'
        );
    }

    public function setAdminLoginError(): void
    {
        $this->session->setKey(
            "adminWrongCredentials",
            '<div class="alert alert-danger" role="alert">
                <b>Wrong credentials!</b>
            </div>'
        );
    }

    public function setRegistrationError(\Exception $exception): void
    {
        $this->session->setKey(
            "registrationError",
            "<div class='alert alert-danger' role='alert'>
                <b>{$exception->getMessage()}</b>
            </div>"
        );
    }

    public function setUniversalError(\Exception $exception): void
    {
        $this->session->setKey(
            "universalError",
            "<div class='alert alert-danger' role='alert'>
                <form action='/unsetMessage' method='post'>
                    <b>{$exception->getMessage()}</b>
                    <button class='col-md-1 btn btn-danger' name='unsetMessage' type='submit'>Ок</button>
                </form>
            </div>"
        );
    }

    public function unsetError(): void
    {
        $this->session->deleteKey("universalError");
    }
}
