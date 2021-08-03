<?php

namespace App\Model;

use Framework\Core\AbstractModel\Model;

class BookModel extends Model
{
    public function getById(int $id): ?array
    {
        $query = $this->dbConnect->prepare('SELECT * FROM `books` WHERE id = ?');
        $query->execute([$id]);
        return $query->fetchAll();
    }

    public function getAll(): ?array
    {
        $query = $this->dbConnect->query('SELECT * FROM `books`');
        return $query->fetchAll();
    }

    public function getBySlug(string $slug): ?array
    {
        $query = $this->dbConnect->prepare('SELECT * FROM `books` WHERE slug = ?');
        $query->execute([$slug]);
        return $query->fetchAll();
    }

    public function getAmountInRange(int $from, int $amount): ?array
    {
        $query = $this->dbConnect->prepare('SELECT * FROM `books` WHERE id > :from AND id <= :end');
        $query->execute([":from" => $from, ":end" => $from + $amount]);
        return $query->fetchAll();
    }
}