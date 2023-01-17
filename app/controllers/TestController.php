<?php
namespace App\Controllers;


use App\Models\TestModel as TestModel;
use App\Models\ProductModel as ProductModel;

class TestController extends Controller
{
    private $testModel    = null;
    private $productModel = null;

    public function __construct(TestModel $testModel, ProductModel $productModel)
    {
        $this->testModel    = $testModel;
        $this->productModel = $productModel;
    }

    public function index()
    {
        //$products = $this->testModel->getProducts();
        //$products = $this->testModel->getProducts2();
        $products = $this->testModel->getPriceSum();
        $this->display('test.html', $products);
    }
}