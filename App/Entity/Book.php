<?php

namespace App\Entity;

class Book
{
    private $name;
    private $author;
    private $price;
    private $amount;

    public function __construct($name, $author, $price, $amount)
    {
        $this->name = $name;
        $this->author = $author;
        $this->price = $price;
        $this->amount = $amount;
    }


}