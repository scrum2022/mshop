<?php
namespace App\Controllers;


use App\Models\ProductModel as ProductModel;

class IndexController extends Controller
{
    private $productModel = null;

    public function __construct(ProductModel $productModel)
    {
        $this->productModel = $productModel;
    }

    public function index()
    {
        $products = $this->productModel->getProducts2();
        
        $this->display('index.html', $products);
    }
}