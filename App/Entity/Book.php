<?php

namespace App\Entity;

class Book
{
    private $name;
    private $author;
    private $price;
    private $amount;
    private $image;
    private $description;
    private $slug;

    public function __construct($name, $author, $price, $amount, $image, $description, $slug)
    {
        $this->name = $name;
        $this->author = $author;
        $this->price = $price;
        $this->amount = $amount;
        $this->image = $image;
        $this->description = $description;
        $this->slug = $slug;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getAmount()
    {
        return $this->amount;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getSlug()
    {
        return $this->slug;
    }
}
