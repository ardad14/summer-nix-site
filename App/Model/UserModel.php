<?php

namespace App\Model;

use Framework\Core\AbstractModel\Model;
use PDOException;
use App\Service\BookService;

class UserModel extends Model
{
    public function getByLogin($value): ?array
    {
        try {
            $query = $this->dbConnect->prepare('
                SELECT * 
                FROM `users`
                WHERE login = :value 
            ');
            $query->execute([':value' => $value]);
            return $query->fetchAll();
        } catch (PDOException $e) {
            throw new $e();
        }
    }

    public function getAll(): ?array
    {
        try {
            $query = $this->dbConnect->query('
                SELECT * 
                FROM `users`
            ');
            return $query->fetchAll();
        } catch (PDOException $e) {
            throw new $e();
        }
    }

    public function setNewUser(
        string $name,
        string $surname,
        string $email,
        string $phone,
        string $login,
        string $password
    ): void {
        try {
            $query = $this->dbConnect->prepare('
                INSERT 
                INTO `users`
                (name, surname, email, phone, login, password) 
                VALUES (:name, :surname, :email, :phone, :login, :password) 
            ');

            $query->execute([
                ':name' => $name,
                ':surname' => $surname,
                ':email' => $email,
                ':phone' => $phone,
                ':login' => $login,
                ':password' => $password
            ]);
        } catch (PDOException $e) {
            throw new $e();
        }
    }

    public function setNewBook(int $userId, int $bookId): void
    {
        try {
            $query = $this->dbConnect->prepare('
                INSERT 
                INTO `books_users`
                (id_book, id_user) 
                VALUES (:bookId, :userId) 
            ');
            $query->execute([':userId' => $userId, ':bookId' => $bookId]);
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
}
