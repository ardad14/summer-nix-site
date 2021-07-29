<?php

namespace App\Controller;

use App\Service\BookService;
use Framework\Core\AbstractController\Controller;

class ProductController extends Controller
{
    public function product()
    {
        $service = new BookService();
        $currentBook = $service->getBySlug($_GET['slug']);
        $this->templeater->renderContent(
            'Товар',
            'product',
            ["book" => $currentBook]
        );
    }

    public function catalog()
    {
        $service = new BookService();
        $allBooks = $service->getAll();
        $this->templeater->renderContent(
            'Каталог',
            'catalog',
            ['books' => $allBooks]
        );
    }


}