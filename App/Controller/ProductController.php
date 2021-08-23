<?php

namespace App\Controller;

use App\Service\BookService;
use Framework\Core\AbstractController\Controller;
use Framework\Core\Pagination\Pagination;
use Framework\Core\Validator\Validator;

class ProductController extends Controller
{
    private BookService $bookService;
    private Validator $validator;
    private Pagination $pagination;

    public function __construct()
    {
        parent::__construct();
        $this->bookService = new BookService();
        $this->validator = new Validator();
        $this->pagination = new Pagination();
    }

    public function product(): void
    {
        $currentBook = $this->bookService->getByField(["slug" => $_GET['slug']]);
        $this->templeater->renderContent(
            'Товар',
            'product',
            ["book" => $currentBook]
        );
    }

    public function catalog(): void
    {
        $this->pagination = new Pagination();
        if(isset($_POST['sorting'])) {
            $_SESSION["sorting"] = $_POST['sorting'];
        }

        if(isset($_POST['priceFrom'])) {
            $_SESSION["priceFrom"] = $_POST['priceFrom'];
        }
        if(isset($_POST['priceUntil'])) {
            $_SESSION["priceUntil"] = $_POST['priceUntil'];
        }

        $this->templeater->renderContent(
            'Каталог',
            'catalog',
            [
                'pagination' => $this->pagination->getPageAmount(),
                'currentPage' => $this->pagination->getCurrentPage()
            ]
        );
    }

    public function booksCatalogJson()
    {
        $allBooks = $this->pagination->getBooks();

        $jsonFormat = array();
        foreach ($allBooks as $book) {
            $jsonFormat[] = [
                "title" => $book->getTitle(),
                "image" => $book->getImage(),
                "author" => $book->getAuthor(),
                "price" => $book->getPrice(),
                "slug" => $book->getSlug()
            ];
        }

        echo json_encode($jsonFormat);
    }

    public function clearFiltration()
    {
        $this->bookService->clearSorting();
        header("location: ../catalog");
    }

    public function search(): void
    {
        try {
            $currentBook = $this->bookService->getByField(["title" => $_POST['search']]);
        } catch (\Exception $e) {
            $this->validator->setUniversalError($e);
            header("location: ../main");
            return;
        }

        $this->templeater->renderContent(
            'Товар',
            'product',
            ["book" => $currentBook]
        );
    }

    public function unsetError(): void
    {
        $this->validator->unsetError();
        header("location: ../main");
    }
}
