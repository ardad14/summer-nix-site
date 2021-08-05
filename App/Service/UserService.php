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

    public function getById($id): array
    {
        return $this->userMapper->mapUser($this->userModel->getById($id));
    }

    public function getAll(): array
    {
        return $this->userMapper->mapUser($this->userModel->getAll());
    }

    public function getByLogin($login): array
    {
        return $this->userMapper->mapUser($this->userModel->getByLogin($login));
    }

}