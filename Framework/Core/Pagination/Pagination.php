<?php

namespace Framework\Core\Pagination;

use App\Service\BookService;
use App\Service\CatalogService;

class Pagination
{
    private $totalCount;
    private $pageAmount;
    private BookService $bookService;
    private const BOOKAMOUNT = 6;

    public function __construct()
    {
        $this->bookService = new BookService();
        $this->totalCount = count($this->bookService->getAll());
        $this->pageAmount = $this->totalCount / self::BOOKAMOUNT;
    }

    public static function getBookAmount(): int
    {
        return self::BOOKAMOUNT;
    }

    public function getPageAmount()
    {
        $arr = array();
        for ($i = 1; $i <= $this->pageAmount; $i++) {
            $arr[] = $i;
        }
        return $arr;
    }

    public function getCurrentPage(): int
    {
        if(!isset($_GET['page'])) {
            $_GET['page'] = 1;
            $currentPage = 1;
        } else {
            $currentPage = ($this->getBookFromSelect() + self::BOOKAMOUNT) / self::BOOKAMOUNT;
        }
        return $currentPage;
    }

    public function getBookFromSelect(): int
    {
        if(!isset($_GET['page'])) {
            $bookFrom = 0;
        } else {
            $bookFrom = $_GET['page']  *  self::BOOKAMOUNT -  self::BOOKAMOUNT;
        }
        return $bookFrom;
    }

    public function getBooks(): array
    {
        $catalogService = new CatalogService();
        $bookFromSelect = $this->getBookFromSelect();
        if(isset($_SESSION["priceFrom"]) || isset($_SESSION["priceUntil"])) {
            $allBooks = $catalogService->filterCatalog();
        } else {
            $allBooks = $catalogService->sortingCatalog();
        }
        $pageBooks = array();
        $i = 0;
        foreach ($allBooks as $book) {
            if ($i >= $bookFromSelect && $i < $bookFromSelect + self::getBookAmount()) {
                $pageBooks[] = $book;
            } 
            $i++;
        }
        return $pageBooks;
    }

}