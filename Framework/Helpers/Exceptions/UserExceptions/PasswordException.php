<?php

namespace Framework\Helpers\Exceptions\UserExceptions;

use Exception;

class PasswordException extends Exception
{
    public function __construct()
    {
        parent::__construct("Ошибка в пароле", 0, null);
    }
}
