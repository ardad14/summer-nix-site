<?php

namespace App\Controller;

use A\B;
use Framework\Core\AbstractController\Controller;
use App\Service\BookService;

class MainController extends Controller
{
    private BookService $bookService;

    public function __construct()
    {
        parent::__construct();
        $this->bookService = new BookService();
    }


    public function main()
    {
        $allBooks = $this->bookService->getAll();
        shuffle($allBooks);
        $mainBooks = array_slice($allBooks,0,3);
        $this->templeater->renderContent(
            'Главная',
            'main',
            ["books" => $mainBooks]
        );
    }
}