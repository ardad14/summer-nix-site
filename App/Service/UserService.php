<?php

namespace App\Service;

use App\Model\UserModel;
use App\Mapper\UserMapper;

class UserService
{
    private UserModel $userModel;
    private UserMapper $userMapper;

    public function __construct()
    {
        $this->userModel = new userModel();
        $this->userMapper = new userMapper();
    }
    /*
    public function getById($id): array
    {
        return $this->userMapper->mapUser($this->userModel->getById($id));
    }
    */
    public function getAll(): array
    {
        return $this->userMapper->mapUser($this->userModel->getAll());
    }

    public function getBy($key, $value): array
    {
        return $this->userMapper->mapUser($this->userModel->getBy($key, $value));
    }

    public function getByLogin($value): array
    {
        return $this->userMapper->mapUser($this->userModel->getByLogin($value));
    }

    public function setNewUser(
        string $name,
        string $surname,
        string $email,
        string $phone,
        string $login,
        string $password
    ): void {
        $this->userModel->setNewUser(
            $name,
            $surname,
            $email,
            $phone,
            $login,
            $password
        );
    }

    public function setNewBook(int $userId, int $bookId): void
    {
        $this->userModel->setNewBook($userId, $bookId);
    }

    public function deleteBook(int $userId, int $bookId): void
    {
        $this->userModel->deleteBook($userId, $bookId);
    }

    public function getAllBooks(int $userId): array
    {
        return $this->userModel->getAllBooks($userId);
    }
}
