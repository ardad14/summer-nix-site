<?php

namespace App\Controller;

use Framework\Core\AbstractController\Controller;
use App\Service\BookService;
use Framework\Core\Pagination\Pagination;

class AdminController extends Controller
{
    private BookService $bookService;

    public function __construct()
    {
        parent::__construct();
        $this->bookService = new BookService();
    }

    public function admin(): void
    {
        if ($this->authentication->isAdminAuth()) {
            header("location: /admin/book");
        } else {
            header("location: /admin/login");
        }
    }

    public function book(): void
    {
        if ($this->authentication->isAdminAuth()) {
            $pagination = new Pagination();
            $allBooks = $this->bookService->getAll();
            $this->templeater->renderAdmin(
                'adminBook',
                [
                    'books' => $allBooks,
                    'pagination' => $pagination->getPageAmount(),
                    'currentPage' => $pagination->getCurrentPage()
                ]
            );
        } else {
            header("location: /admin/login");
        }
    }

    public function customer(): void
    {
        if ($this->authentication->isAdminAuth()) {
            $this->templeater->renderAdmin('adminCustomer');
        } else {
            header("location: /admin/login");
        }
    }

    public function login(): void
    {
        $this->templeater->renderAdmin('adminLogin');
    }

    public function auth(): void
    {
        if ($this->authentication->authAdmin($_POST["adminLogin"], $_POST["adminPassword"])) {
            header("location: /admin/book");
        } else {
            header("location: ../login");
        }
    }

    public function deleteBook(): void
    {
        $this->bookService->deleteBook($_POST['id']);
        header("location: /admin/book");
    }

    public function update(): void
    {
        if (!$this->authentication->isAdminAuth()) {
            header("location: /admin/login");
        }
        $currentBook = $this->bookService->getByField(['id' => $_GET['id']]);
        $this->templeater->renderAdmin('updateBook', ['book' => $currentBook]);
    }

    public function changeBookData(): void
    {
        $this->bookService->updateBook($_POST['id']);
        header("location: /admin/book");
    }

    public function addForm(): void
    {
        $this->templeater->renderAdmin('addBook');
    }

    public function add(): void
    {
        $this->bookService->createBook();
        header("location: /admin/book");
    }
}
