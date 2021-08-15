<?php

namespace Framework\Helpers\Exceptions\UserExceptions;

use Exception;

class SurnameException extends Exception
{
    public function __construct()
    {
        parent::__construct("Ошибка в фамилии", 0, null);
    }
}
