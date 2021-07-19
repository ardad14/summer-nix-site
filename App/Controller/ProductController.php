<?php


namespace App\Controller;

use Framework\Core\Templeater\Templeater;
use App\Model\BookModel;
use Framework\Core\ProductStorage\Model;


class ProductController
{
    private Templeater $templeater;

    public function __construct()
    {
        $this->templeater = new Templeater();
    }

    public function product()
    {
        $model = new BookModel();
        $currentBook = $model->getById(2);
        $this->templeater->renderContent('Товар', 'product', ["book" => $currentBook]);
    }

}