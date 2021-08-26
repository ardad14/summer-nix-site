<?php

namespace App\Model;

use App\Entity\Book;
use Framework\Core\AbstractModel\Model;
use PDOException;
use Framework\Helpers\Exceptions\BookExceptions\NotSuchBookException;

class BookModel extends Model
{
    /**
     * @throws PDOException
     * @throws NotSuchBookException
     */
    public function getByField(array $params): ?array
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
                    $query .= " AND " . $field .  " = " . "'$value'";
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

    /**
     * @throws PDOException
     * @throws NotSuchBookException
     */
    public function getInInterval(string $field, $minValue = null, $maxValue = null): ?array
    {
        try {
            $query = '
                SELECT * 
                FROM `books`
                WHERE ';
            if ($minValue && !$maxValue) {
                $query .= $field . " > " . $minValue;
            } else if (!$minValue && $maxValue) {
                $query .= $field . " < " . $maxValue;
            } else if ($minValue && $maxValue) {
                $query .= $field . " > " . $minValue .
                    " AND " . $field . " < " . $maxValue;
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

    public function buyBook(int $id, int $amount): void
    {
        try {
            $result = $this->dbConnect->prepare("
                UPDATE `books`
                SET amount = amount - :amount
                WHERE id = :id 
            ");
            $result->execute([":amount" => $amount, ":id" => $id]);
        } catch (PDOException $e) {
            throw new $e();
        }
    }

    public function createBook(
        $title,
        $author,
        $price,
        $amount,
        $image,
        $description,
        $slug,
        $genre
    ): void {
        try {
            $result = $this->dbConnect->prepare("
                INSERT 
                INTO `books`
                (title, description, author, price, amount, image, slug, genre)
                VALUES 
                (:title, :description, :author, :price, :amount, :image, :slug, :genre) 
            ");
            $result->execute([
                ":title" => $title,
                ":description" => $description,
                ":author" => $author,
                ":price" => $price,
                ":amount" => $amount,
                ':image' => $image,
                ":slug" => $slug,
                ":genre" => $genre,
            ]);
        } catch (PDOException $e) {
            throw new $e();
        }
    }

    public function deleteBook(int $id): void
    {
        try {
            $result = $this->dbConnect->prepare("
                DELETE 
                FROM `books`
                WHERE id = :id 
            ");
            $result->execute([":id" => $id]);
        } catch (PDOException $e) {
            throw new $e();
        }
    }

    public function updateBook(
        $id,
        $title,
        $author,
        $price,
        $amount,
        $image,
        $description,
        $slug,
        $genre
    ): void {
        try {
            $result = $this->dbConnect->prepare("
                UPDATE `books`
                SET 
                    title = :title,
                    description = :description,
                    author = :author,
                    price = :price,
                    amount = :amount,
                    image = :image,
                    slug = :slug,
                    genre = :genre
                WHERE 
                      id = :id 
            ");
            $result->execute([
                ':id' => $id,
                ":title" => $title,
                ":description" => $description,
                ":author" => $author,
                ":price" => $price,
                ":amount" => $amount,
                ":image" => $image,
                ":slug" => $slug,
                ":genre" => $genre,
            ]);
        } catch (PDOException $e) {
            throw new $e();
        }
    }
}
