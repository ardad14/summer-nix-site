<?php

namespace App\Controller;

use Framework\Core\AbstractController\Controller;
use App\Service\BookService;
use App\Service\UserService;
use Framework\Core\Validator\Validator;
use Framework\Helpers\Exceptions\BookExceptions\NotEnoughBookException;

class BasketController extends Controller
{
    private BookService $bookService;
    private UserService $userService;
    private Validator $validator;

    public function __construct()
    {
        parent::__construct();
        $this->bookService = new BookService();
        $this->userService = new UserService();
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

        $currentBook = $this->bookService->getByField(["slug" => $_POST['slug']]);

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
        $currentBook = $this->bookService->getByField(["slug" => $_POST['slug']]);

        $key = $this->isBookInBasket($currentBook);
        unset($_SESSION['books'][$key]);

        header("location: ../basket");
    }

    public function buy(): void
    {
        try {
            $currentBook = $this->bookService->getByField(["slug" => $_POST['slug']]);
            $this->bookService->buyBook($currentBook[0]->getId(), $_POST["amount"]);

            $userId = $this->userService->getByField(["login" => $this->authentication->getLogin()]);
            $this->userService->setNewBook($userId[0]->getId(), $currentBook[0]->getId(), $_POST["amount"]);

            $this->deleteBook();
        } catch (NotEnoughBookException $exception) {
            $this->validator->setUniversalError($exception);
        }

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
