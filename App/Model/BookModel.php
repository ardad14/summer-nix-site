<?php

namespace App\Model;

use Framework\Core\AbstractModel\Model;
use PDOException;
use Framework\Helpers\Exceptions\BookExceptions\NotSuchBookException;

class BookModel extends Model
{
    /**
     * @throws PDOException
     * @throws NotSuchBookException
     */
    public function getBy(array $params): ?array
    {
        try {
            $query = '
                SELECT * 
                FROM `books`
                WHERE';

            $i = 0;
            foreach ($params as $field => $value) {
                if ($i === 0) {
                    $query .= " " . $field .  " = " . "'$value'" . " ";
                } else {
                    $query .= " AND " . "$field = '$value'";
                }
                $i++;
            }

            $result = $this->dbConnect->prepare($query);
            $result->execute();
        } catch (PDOException $e) {
            throw new $e();
        }
        $bookArray = $result->fetchAll();
        if (empty($bookArray)) {
            throw new NotSuchBookException();
        }
        return $bookArray;
    }

    /**
     * @throws PDOException
     * @throws NotSuchBookException
     */
    public function getAll($orders = null, $type = null): ?array
    {
        try {
            $query = '
                SELECT * 
                FROM `books`
            ';

            if ($orders) {
                $query .= " ORDER BY " . $orders;
            }
            if ($type) {
                $query .= " " . $type;
            }

            $result = $this->dbConnect->prepare($query);
            $result->execute();

        } catch (PDOException $e) {
            throw new $e();
        }

        $bookArray = $result->fetchAll();
        if (empty($bookArray)) {
            throw new NotSuchBookException();
        }
        return $bookArray;
    }
}
