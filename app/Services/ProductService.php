<?php

namespace App\Services;

use App\Repositories\ProductRepository;

class ProductService
{

    private $product_repo;

    public function __construct(ProductRepository $product_repo)
    {
        $this->product_repo = $product_repo;
    }

    public function getAll()
    {
        return $this->product_repo->getAll();
    }

    public function getProduct($id)
    {
        return $this->product_repo->getProduct($id);
    }
}