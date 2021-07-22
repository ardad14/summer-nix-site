<?php

namespace App\Model;

use App\Entity\Book;
use Framework\Core\AbstractModel\Model;

class BookModel extends Model
{
    public function mapBook(array $book): Book
    {
        return new Book(
            $book["name"],
            $book["author"],
            $book["price"],
            $book["amount"],
            $book["image"],
            $book["description"],
            $book["slug"],
            $book["genre"]
        );
    }

    public function getById(int $id): ?Book
    {
        if(!empty($this->products[$id])) {
            return $this->mapBook($this->products[$id]);
        }
        return null;
    }

    public function getAll(): array
    {
        $products = array();
        foreach($this->products as $id => $value) {
            $products[] = $this->mapBook($this->products[$id]);
        }
        return $products;
    }

    public function getBySlug(string $slug): ?Book
    {
        foreach($this->products as $id => $value) {
            if($this->products[$id]["slug"] === $slug) {
                return $this->mapBook($this->products[$id]);
            }
        }
        return null;
    }
}