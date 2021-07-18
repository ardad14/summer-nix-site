<?php

namespace App\Model;

use App\Entity\Book;
use Framework\Core\ProductStorage\Model;

class BookModel extends Model
{
    public function getById(int $id): ?Book
    {
        if(!empty($this->products[$id])) {
            return new Book(
                $this->products[$id]["name"],
                $this->products[$id]["author"],
                $this->products[$id]["price"],
                $this->products[$id]["amount"]
            );
        }
        return null;
    }

    public function getAll(): array
    {
        $products = array();
        foreach($this->products as $id => $value) {
            $products[] = new Book(
                $this->products[$id]["name"],
                $this->products[$id]["author"],
                $this->products[$id]["price"],
                $this->products[$id]["amount"]
            );
        }
        return $products;
    }
}