<?php

namespace Framework\Database;

use PDO;
use PDOException;

class Db
{
    protected static $instance;

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function connect(): ?PDO
    {
        try {
            return new PDO(
                "mysql:host=localhost;dbname=Book",
                'artem',
                "Stepan12@",
            );
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            return null;
        }
    }
}