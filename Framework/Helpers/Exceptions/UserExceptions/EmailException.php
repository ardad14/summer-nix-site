<?php

namespace Framework\Helpers\Exceptions\UserExceptions;

use Exception;

class EmailException extends Exception
{
    public function __construct()
    {
        parent::__construct("Ошибка в электронной почте", 0, null);
    }
}