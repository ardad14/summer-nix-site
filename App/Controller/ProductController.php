<?php

namespace App\Controller;

use App\Service\BookService;
use Framework\Core\AbstractController\Controller;
use Framework\Core\Pagination\Pagination;

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
        $pagination = new Pagination();
        $service = new BookService();
        $allBooks = $service->getAmountInRange($pagination->getBookFromSelect(),  $pagination::getBookAmount());
        $this->templeater->renderContent(
            'Каталог',
            'catalog',
            ['books' => $allBooks, 'pagination' => $pagination->getPageAmount(), 'currentPage' => $pagination->getCurrentPage()]
        );
    }


}