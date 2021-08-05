<?php

namespace App\Mapper;

use App\Entity\Book;

class BookMapper
{
    public function mapBook(array $dbData): array
    {
        $books = [];
        foreach($dbData as $line) {
            $books[] = new Book(
                $line["title"],
                $line["author"],
                $line["price"],
                $line["amount"],
                $line["image"],
                $line["description"],
                $line["slug"],
                $line["genre"]
            );
        }
        return $books;
    }
}