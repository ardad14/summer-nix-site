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

    public function getByField(array $params, $role = "customer"): array
    {
        return $this->userMapper->mapUser($this->userModel->getByField($params, $role));
    }

    public function getAll(): array
    {
        return $this->userMapper->mapUser($this->userModel->getAll());
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

    public function setNewBook(int $userId, int $bookId, int $amount): void
    {
        $this->userModel->setNewBook($userId, $bookId, $amount);
    }

    public function deleteBook(int $userId, int $bookId): void
    {
        $this->userModel->deleteBook($userId, $bookId);
    }

    public function getAllBooks(int $userId): array
    {
        return $this->userModel->getAllBooks($userId);
    }

    public function deleteUser(int $userId): void
    {
        $this->userModel->deleteUser($userId);
    }

    public function updateUser(int $userId): void
    {
        $this->userModel->updateUser(
            $userId,
            $_POST['name'],
            $_POST['surname'],
            $_POST['email'],
            $_POST['phone'],
            $_POST['login'],
        );
    }
}
