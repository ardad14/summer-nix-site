<?php

namespace Framework\Helpers\Exceptions\UserExceptions;

use Exception;

class LoginException extends Exception
{
    public function __construct()
    {
        parent::__construct("Ошибка в логине", 0, null);
    }
}
