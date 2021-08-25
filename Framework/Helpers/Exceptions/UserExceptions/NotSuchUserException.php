<?php

namespace Framework\Helpers\Exceptions\UserExceptions;

use Exception;

class NotSuchUserException extends Exception
{
    public function __construct()
    {
        parent::__construct("Не существует такого пользователя", 0, null);
    }
}