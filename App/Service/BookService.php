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

    public function getByField(array $params): array
    {
        return $this->bookMapper->mapBook($this->bookModel->getByField($params));
    }

    public function getAll($order = null, $type = null): array
    {
        return $this->bookMapper->mapBook($this->bookModel->getAll($order, $type));
    }

    public function getInIterval(string $field, $minValue = null, $maxValue = null)
    {
        return $this->bookMapper->mapBook($this->bookModel->getInInterval($field, $minValue, $maxValue));
    }

    public function clearSorting()
    {
        if (isset($_SESSION['priceFrom'])) {
            unset($_SESSION['priceFrom']);
        }
        if (isset($_SESSION['priceUntil'])) {
            unset($_SESSION['priceUntil']);
        }
        if (isset($_SESSION['sorting'])) {
            unset($_SESSION['sorting']);
        }
    }

}
