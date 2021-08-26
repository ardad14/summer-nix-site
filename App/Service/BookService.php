<?php

namespace App\Service;

use App\Entity\Book;
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

    public function buyBook(string $id, int $amount): void
    {
        $this->bookModel->buyBook($id, $amount);
    }

    public function createBook(): void
    {
        $target_dir = "image/";
        $target_file =  $_POST['title'] . "_" . basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_dir . $target_file);

        $this->bookModel->createBook(
            $_POST['title'],
            $_POST['author'],
            $_POST['price'],
            $_POST['amount'],
            $target_file,
            $_POST['description'],
            $_POST['slug'],
            $_POST['genre'],
        );

    }

    public function deleteBook($id)
    {
        $this->bookModel->deleteBook($id);
    }

    public function updateBook($id)
    {
        if (isset($_FILES["image"]["name"])) {
            $target_dir = "image/";
            $target_file =  $_POST['title'] . "_" . basename($_FILES["image"]["name"]);
            move_uploaded_file($_FILES["image"]["tmp_name"], $target_dir . $target_file);
        }

        $this->bookModel->updateBook(
            $id,
            $_POST['title'],
            $_POST['author'],
            $_POST['price'],
            $_POST['amount'],
            $target_file,
            $_POST['description'],
            $_POST['slug'],
            $_POST['genre'],
        );
    }
}
