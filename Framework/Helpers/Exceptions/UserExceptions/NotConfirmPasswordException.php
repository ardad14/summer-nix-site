<?php

namespace Framework\Helpers\Exceptions\UserExceptions;

use Exception;

class NotConfirmPasswordException extends Exception
{
    public function __construct()
    {
        parent::__construct("Пароли не совпадают", 0, null);
    }
}
