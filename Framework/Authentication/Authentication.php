<?php

namespace Framework\Authentication;

use Framework\Helpers\Exceptions\UserExceptions\NotSuchUserException;
use Framework\Session\Session;
use App\Service\UserService;
use Framework\Core\Validator\Validator;

class Authentication
{
    public Session $session;
    private Validator $validator;
    private UserService $userService;

    public function __construct()
    {
        $this->session = Session::getInstance();
        $this->validator = new Validator();
        $this->userService = new UserService();
    }

    public function isAuth(): bool
    {
        return $this->session->containsKey("userName");
    }

    public function isAdminAuth(): bool
    {
        return $this->session->containsKey("adminName");
    }

    public function auth($login, $pass): bool
    {
        try {
            $user = $this->userService->getByField(["login" => $login]);
            if ($user != null && $user[0]->getlogin() === $login && $pass === $user[0]->getPassword()) {
                $this->session->setKey("userName", $user[0]->getLogin());
                $this->session->deleteKey("wrongCredentials");
                return true;
            }
            $this->validator->setLoginError();
            return false;
        } catch (NotSuchUserException $e) {
            $this->validator->setLoginError();
            return false;
        }
    }

    public function authAdmin($login, $pass): bool
    {
        try {
            $user = $this->userService->getByField(["login" => $login], "admin");
            if ($user != null && $user[0]->getlogin() === $login && $pass === $user[0]->getPassword()) {
                $this->session->setKey("adminName", $user[0]->getLogin());
                $this->session->deleteKey("adminWrongCredentials");
                return true;
            }
            $this->validator->setAdminLoginError();
            return false;
        } catch (NotSuchUserException $e) {
            $this->validator->setAdminLoginError();
            return false;
        }
    }

    public function getLogin(): ?string
    {
        return $this->session->getKey('userName');
    }

    public function logOut(): void
    {
        $this->session->deleteKey("userName");
    }
}
