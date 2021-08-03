<?php

namespace App\Service;

use App\Model\BookModel;
use App\Mapper\BookMapper;

class BookService
{
    private BookModel $bookModel;
    private BookMapper $bookMapper;

    public function __construct()
    {
        $this->bookModel = new BookModel();
        $this->bookMapper = new BookMapper();
    }

    public function getAll(): array
    {
        return $this->bookMapper->mapBook($this->bookModel->getAll());
    }

    public function getBySlug($slug): array
    {
        return $this->bookMapper->mapBook($this->bookModel->getBySlug($slug));
    }

    public function getAmountInRange($from, $amount): array
    {
        return $this->bookMapper->mapBook($this->bookModel->getAmountInRange($from, $amount));
    }
}