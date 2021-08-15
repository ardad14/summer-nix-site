<?php

namespace App\Controller;

use Framework\Core\AbstractController\Controller;
use App\Service\BookService;

class BasketController extends Controller
{
    private BookService $bookService;

    public function __construct()
    {
        parent::__construct();
        $this->bookService = new BookService();
    }

    public function basket(): void
    {
        $books = $this->authentication->session->getKey('books');
        $this->templeater->renderContent(
            'Корзина',
            'basket',
            ["books" => $books]
        );
    }

    public function addBook(): void
    {
        if (!$this->authentication->isAuth()) {
            header("location: ../login");
            return;
        }

        $currentBook = $this->bookService->getBySlug($_POST['slug']);

        $bookBasketId = $this->isBookInBasket($currentBook);
        if ($bookBasketId !== false) {
            $_SESSION['books'][$bookBasketId]['amount'] += 1;
        } else {
            $currentBook['amount'] = 1;
            $_SESSION['books'][] = $currentBook;
        }
        header("location: ../basket");
    }

    public function deleteBook(): void
    {
        if (!$this->authentication->isAuth()) {
            header("location: ../login");
            return;
        }
        $currentBook = $this->bookService->getBySlug($_POST['slug']);
        $basketService = new BasketService();
        $basketService->deleteBook($currentBook);

        $key = $this->isBookInBasket($currentBook);
        unset($_SESSION['books'][$key]);

        header("location: ../basket");
    }

    private function isBookInBasket($book)
    {
        foreach ($_SESSION['books'] as $key => $basket) {
            if (in_array($book[0], $basket)) {
                return $key;
            }
        }
        return false;
    }
}
