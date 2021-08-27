<?php

namespace App\Controller;

use App\Service\RegistrationService;
use Framework\Core\AbstractController\Controller;
use App\Service\BookService;
use App\Service\UserService;

class AdminController extends Controller
{
    private BookService $bookService;
    private UserService $userService;

    public function __construct()
    {
        parent::__construct();
        $this->bookService = new BookService();
        $this->userService = new UserService();
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
            $allBooks = $this->bookService->getAll();
            $this->templeater->renderAdmin(
                'adminBook',
                [
                    'books' => $allBooks,
                ]
            );
        } else {
            header("location: /admin/login");
        }
    }

    public function customer(): void
    {
        if ($this->authentication->isAdminAuth()) {
            $customers = $this->userService->getAll();
            $this->templeater->renderAdmin(
                'adminCustomer',
                [
                    'customers' => $customers
                ]
            );
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

    public function logout(): void
    {
        $this->authentication->logOutAdmin();
        header("location: ../");
    }

    public function deleteBook(): void
    {
        $this->bookService->deleteBook($_POST['id']);
        header("location: /admin/book");
    }

    public function updateBook(): void
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

    public function addBook(): void
    {
        $this->bookService->createBook();
        header("location: /admin/book");
    }

    public function deleteCustomer(): void
    {
        $this->userService->deleteUser($_POST['id']);
        header("location: /admin/customer");
    }

    public function updateCustomer(): void
    {
        if (!$this->authentication->isAdminAuth()) {
            header("location: /admin/login");
        }
        $currentUser = $this->userService->getByField(['id' => $_GET['id']]);
        $this->templeater->renderAdmin('updateCustomer', ['customer' => $currentUser]);
    }

    public function changeCustomerData(): void
    {
        $this->userService->updateUser($_POST['id']);
        header("location: /admin/customer");
    }

    public function addCustomerForm(): void
    {
        $this->templeater->renderAdmin('addCustomer');
    }

    public function addCustomer(): void
    {
        $registrationService = new RegistrationService();
        $registrationService->registration(
            $_POST['name'],
            $_POST['surname'],
            $_POST['email'],
            $_POST['phone'],
            $_POST['login'],
            $_POST['password'],
            $_POST['confirm']
        );
        header("location: /admin/customer");
    }
}
