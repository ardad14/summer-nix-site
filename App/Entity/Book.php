<?php

namespace App\Entity;

class Book
{
    private $title;
    private $author;
    private $price;
    private $amount;
    private $image;
    private $description;
    private $slug;
    private $genre;

    public function __construct($title, $author, $price, $amount, $image, $description, $slug, $genre)
    {
        $this->title = $title;
        $this->author = $author;
        $this->price = $price;
        $this->amount = $amount;
        $this->image = $image;
        $this->description = $description;
        $this->slug = $slug;
        $this->genre = $genre;
    }

    public function getName()
    {
        return $this->title;
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

    public function getGenre()
    {
        return $this->genre;
    }
}
