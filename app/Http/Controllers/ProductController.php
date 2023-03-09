<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ProductService;

class ProductController extends Controller
{
    private $product_service;

    public function __construct(ProductService $product_service)
    {
        $this->product_service = $product_service;
    }

    public function getProduct(Request $request)
    {
        try {
            return $this->product_service->getProduct($request->id);
        } catch (\Throwable $throw) {
            return response()->json(['status'=>'error', 'message'=>$throw->getMessage()]);
        }
    }
}
