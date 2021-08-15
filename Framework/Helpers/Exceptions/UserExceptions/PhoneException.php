<?php

namespace Framework\Helpers\Exceptions\UserExceptions;

use Exception;

class PhoneException extends Exception
{
    public function __construct()
    {
        parent::__construct("Ошибка в телефоне", 0, null);
    }
}
