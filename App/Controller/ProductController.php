<?php

namespace App\Controller;

use App\Model\BookModel;
use Framework\Core\AbstractController\Controller;

class ProductController extends Controller
{
    public function product()
    {
        $model = new BookModel();
        $currentBook = $model->getBySlug($_GET['slug']);
        $this->templeater->renderContent(
            'Товар',
            'product',
            ["book" => $currentBook]
        );
    }

    public function catalog()
    {
        $model = new BookModel();
        $allBooks = $model->getAll();
        $this->templeater->renderContent(
            'Каталог',
            'catalog',
            ['books' => $allBooks]
        );
    }


}