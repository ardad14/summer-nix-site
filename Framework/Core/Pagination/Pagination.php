<?php

namespace Framework\Core\Pagination;

use App\Service\BookService;
use Framework\Session\Session;

class Pagination
{
    private $totalCount;
    private $pageAmount;
    private Session $session;
    private const BOOKAMOUNT = 6;

    public function __construct()
    {
        $this->session = Session::getInstance();
        $bs = new BookService();
        $this->totalCount = count($bs->getAll());
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
            $bookFrom = 1;
        } else {
            $bookFrom = $_GET['page']  *  self::BOOKAMOUNT -  self::BOOKAMOUNT;
        }
        return $bookFrom;
    }

}