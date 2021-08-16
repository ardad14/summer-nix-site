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
    public function getById(int $id): ?array
    {
        try {
            $query = $this->dbConnect->prepare('SELECT * FROM `books` WHERE id = ?');
            $query->execute([$id]);
        } catch (PDOException $e) {
            throw new $e();
        }
        $bookArray = $query->fetchAll();
        if (empty($bookArray)) {
            throw new NotSuchBookException();
        }
        return $bookArray;
    }

    /**
     * @throws PDOException
     * @throws NotSuchBookException
     */
    public function getAll(): ?array
    {
        try {
            $query = $this->dbConnect->query('
                SELECT * 
                FROM `books`
            ');
        } catch (PDOException $e) {
            throw new $e();
        }

        $bookArray = $query->fetchAll();
        if (empty($bookArray)) {
            throw new NotSuchBookException();
        }
        return $bookArray;
    }

    /**
     * @throws PDOException
     * @throws NotSuchBookException
     */
    public function getBySlug(string $slug): ?array
    {
        try {
            $query = $this->dbConnect->prepare('
                SELECT * 
                FROM `books` 
                WHERE slug = ?
            ');
            $query->execute([$slug]);
        } catch (PDOException $e) {
            throw new $e();
        }

        $bookArray = $query->fetchAll();
        if (empty($bookArray)) {
            throw new NotSuchBookException();
        }
        return $bookArray;
    }

    /**
     * @throws PDOException
     * @throws NotSuchBookException
     */
    public function getByTitle(string $title): ?array
    {
        try {
            $query = $this->dbConnect->prepare('
                SELECT * 
                FROM `books` 
                WHERE title = ?
            ');
            $query->execute([$title]);
        } catch (PDOException $e) {
            throw new $e();
        }

        $bookArray = $query->fetchAll();
        if (empty($bookArray)) {
            throw new NotSuchBookException();
        }
        return $bookArray;
    }

    /**
     * @throws  PDOException
     * @throws NotSuchBookException
     */
    public function getAmountInRange(int $from, int $amount): ?array
    {
        try {
            $query = $this->dbConnect->prepare('
                SELECT * 
                FROM `books`
                WHERE id > :from 
                  AND id <= :end
            ');
            $query->execute([":from" => $from, ":end" => $from + $amount]);
        } catch (PDOException $e) {
            throw new $e();
        }

        $bookArray = $query->fetchAll();
        if (empty($bookArray)) {
            throw new NotSuchBookException();
        }
        return $bookArray;
    }
}
