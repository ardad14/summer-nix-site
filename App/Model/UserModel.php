<?php

namespace App\Model;

use Framework\Core\AbstractModel\Model;
use Framework\Helpers\Exceptions\UserExceptions\NotSuchUserException;
use PDOException;
use App\Service\BookService;

class UserModel extends Model
{
    /**
     * @throws PDOException
     * @throws NotSuchUserException
     */
    public function getByField(array $params, string $role): ?array
    {
        try {
            $query = '
                SELECT * 
                FROM `users`
                WHERE role = ' . "'$role'" . ' AND ';

            $i = 0;
            foreach ($params as $field => $value) {
                if ($i === 0) {
                    $query .= $field .  " = " . "'$value'" . " ";
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
        $userArray = $result->fetchAll();
        if (empty($userArray)) {
            throw new NotSuchUserException();
        }
        return $userArray;
    }

    /**
     * @throws PDOException
     * @throws NotSuchUserException
     */
    public function getAll(): ?array
    {
        try {
            $query = '
                SELECT * 
                FROM `users`
            ';

            $result = $this->dbConnect->prepare($query);
            $result->execute();

        } catch (PDOException $e) {
            throw new $e();
        }

        $userArray = $result->fetchAll();
        if (empty($userArray)) {
            throw new NotSuchUserException();
        }
        return $userArray;
    }

    public function setNewUser(
        string $name,
        string $surname,
        string $email,
        string $phone,
        string $login,
        string $password,
        string $role = 'customer'
    ): void {
        try {
            $query = $this->dbConnect->prepare('
                INSERT 
                INTO `users`
                (name, surname, email, phone, login, password, role) 
                VALUES (:name, :surname, :email, :phone, :login, :password, :role) 
            ');

            $query->execute([
                ':name' => $name,
                ':surname' => $surname,
                ':email' => $email,
                ':phone' => $phone,
                ':login' => $login,
                ':password' => $password,
                ':role' => $role
            ]);
        } catch (PDOException $e) {
            throw new $e();
        }
    }

    public function updateUser(
        $id,
        $name,
        $surname,
        $email,
        $phone,
        $login
    ): void {
        try {
            $result = $this->dbConnect->prepare("
                UPDATE `users`
                SET 
                    name = :name,
                    surname = :surname,
                    email = :email,
                    phone = :phone,
                    login = :login                    
                WHERE 
                      id = :id 
            ");
            $result->execute([
                ':id' => $id,
                ':name' => $name,
                ':surname' => $surname,
                ':email' => $email,
                ':phone' => $phone,
                ':login' => $login,
            ]);
        } catch (PDOException $e) {
            throw new $e();
        }
    }

    public function setNewBook(int $userId, int $bookId, int $amount): void
    {
        try {
            $query = $this->dbConnect->prepare('
                INSERT 
                INTO `books_users`
                (id_user, id_book, amount) 
                VALUES (:userId, :bookId, :amount) 
            ');
            $query->execute([':userId' => $userId, ':bookId' => $bookId, ':amount' => $amount]);
        } catch (PDOException $e) {
            throw new $e();
        }
    }

    public function deleteBook(int $userId, int $bookId): void
    {
        try {
            $query = $this->dbConnect->prepare('
                DELETE 
                FROM `books_users`
                WHERE id_book = :bookId 
                  AND id_user = :userId
            ');
            $query->execute([':userId' => $userId, ':bookId' => $bookId]);
        } catch (PDOException $e) {
            throw new $e();
        }
    }

    public function getAllBooks(int $userId): ?array
    {
        try {
            $bookService = new BookService();
            $query = $this->dbConnect->prepare('
                SELECT DISTINCT id_book
                FROM `books_users`
                WHERE id_user = ?
            ');
            $query->execute([$userId]);
            $booksIdArray = $query->fetchAll();
            $booksArray = array();
            foreach ($booksIdArray as $value) {
                $booksArray[] = $bookService->getById($value['id_book']);
            }
            return $booksArray;
        } catch (PDOException $e) {
            throw new $e();
        }
    }

    public function deleteUser(int $id): void
    {
        try {
            $result = $this->dbConnect->prepare("
                DELETE 
                FROM `users`
                WHERE id = :id 
            ");
            $result->execute([":id" => $id]);
        } catch (PDOException $e) {
            throw new $e();
        }
    }
}
