<?php

namespace Framework\Helpers\Exceptions\BookExceptions;

use Exception;

class NotEnoughBookException extends Exception
{
    public function __construct()
    {
        parent::__construct("Не хватает книг на складе", 0, null);
    }
}