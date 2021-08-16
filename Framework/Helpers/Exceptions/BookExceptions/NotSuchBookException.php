<?php

namespace Framework\Helpers\Exceptions\BookExceptions;

use Exception;

class NotSuchBookException extends Exception
{
    public function __construct()
    {
        parent::__construct("Не существует такой книги", 0, null);
    }
}