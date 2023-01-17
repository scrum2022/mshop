<?php
namespace App\Models;


class TestModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getProducts()
    {
        $query = "SELECT * FROM products";
        $stmt = $this->pdo->query($query);
        $response = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        return $response;
    }

    public function getProducts2()
    {
       $result = $this->queryBuilder->select('products', ['*'])
        ->where(['id', '=', 1])
        ->or(['id', '=', 2])
        ->get()
        ->toArray();
       
       return ($result);
    }

    public function getPriceSum()
    {
        $result = $this->queryBuilder->select('products', ['*'])
        ->order(['price'], 'DESC')
        ->limit(5)
        ->get()
        ->toArray();
       
       return ($result);
    }
}