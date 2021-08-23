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

    public function getBy(array $params): array
    {
        return $this->bookMapper->mapBook($this->bookModel->getBy($params));
    }

    public function getAll($order = null, $type = null): array
    {
        if (!$order) {
            return $this->bookMapper->mapBook($this->bookModel->getAll());
        }
        return $this->bookMapper->mapBook($this->bookModel->getAll($order, $type));
    }
}
