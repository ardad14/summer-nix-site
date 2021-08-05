<?php

namespace App\Model;

use Framework\Core\AbstractModel\Model;

class UserModel extends Model
{
    public function getById(int $id): ?array
    {
        $query = $this->dbConnect->prepare('SELECT * FROM `users` WHERE id = ?');
        $query->execute([$id]);
        return $query->fetchAll();
    }

    public function getAll(): ?array
    {
        $query = $this->dbConnect->query('SELECT * FROM `users`');
        return $query->fetchAll();
    }

    public function getByLogin(string $login): ?array
    {
        $query = $this->dbConnect->prepare('SELECT * FROM `users` WHERE login = ?');
        $query->execute([$login]);
        return $query->fetchAll();
    }
}