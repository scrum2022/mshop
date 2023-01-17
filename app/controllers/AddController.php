<?php
namespace App\Controllers;

use App\Models\ProductModel;

class AddController extends Controller
{
        private $productModel = null;
        public function __construct(ProductModel $productModel)
        {
             $this->productModel = $productModel;
        }

        public function index()
        {
            $data[0]['name'] = $_POST['name'];
            $data[0]['price'] = (float)$_POST['price'];

            $this->productModel->addProduct($data);
        }
        
}