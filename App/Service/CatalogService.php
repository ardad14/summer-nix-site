<?php

namespace App\Service;

class CatalogService
{
    private BookService $bookService;

    public function __construct()
    {
        $this->bookService = new BookService();
    }

    public function sortingCatalog(): array
    {
        $sortBy = null;
        $sortType = null;

        if (isset($_SESSION['sorting'])) {
            switch ($_SESSION['sorting']) {
                case "byTitle":
                    $sortBy = "title";
                    break;
                case "byTitleDesc":
                    $sortBy = "title";
                    $sortType = "DESC";
                    break;
                case "byPrice":
                    $sortBy = "price";
                    break;
                case "byPriceDesc":
                    $sortBy = "price";
                    $sortType = "DESC";
                    break;
                default:
                    $sortBy = "id";
                    break;
            }
        }
        return $this->bookService->getAll($sortBy, $sortType);
    }
}