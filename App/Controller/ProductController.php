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
        $bookAmount = Pagination::getBookAmount();  
        if(!isset($_GET['page'])) {
            $pageFrom = 1;
        } else {
            $pageFrom = $_GET['page']  *  $bookAmount -  $bookAmount;
        }
        $currentPage = ($pageFrom + $bookAmount) / $bookAmount;
        $pagination = new Pagination();
        $service = new BookService();
        $allBooks = $service->getAmountInRange($pageFrom,  $bookAmount);
        $this->templeater->renderContent(
            'Каталог',
            'catalog',
            ['books' => $allBooks, 'pagination' => $pagination->getPageAmount(), 'currentPage' => $currentPage]
        );
    }


}