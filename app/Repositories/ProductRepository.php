<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository
{
    public function getProduct($id)
    {
        return Product::findOrFail($id);
    }
    public function getAll()
    {
        return Product::all();
    }
}