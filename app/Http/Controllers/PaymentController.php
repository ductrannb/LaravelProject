<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Payme\ApiService;
use App\Models\Order;
use App\Services\OrderService;
use App\Services\ProductService;

class PaymentController extends Controller
{

    private $order_service;
    private $product_service;
    private $order_detail_ctl;

    public function __construct(OrderService $order_service, ProductService $product_service, OrderDetailController $order_detail_ctl)
    {
        $this->order_service = $order_service;
        $this->product_service = $product_service;
        $this->order_detail_ctl = $order_detail_ctl;
    }

    public function index()
    {
        $products = $this->product_service->getAll();
        $products = $products->map(function ($product) {
            $product->quantity = rand(1, 5);
            return $product;
        });
        $total_money = 0;
        foreach ($products as $product) {
            $total_money += $product->price * $product->quantity;
        }
        return view('order.checkout')->with(['products'=>$products, 'total_money'=>$total_money]);
    }

    public function create(Request $request)
    {
        $order = $this->order_service->create($request->except('product_ids', 'product_quantities'));
        // dd($order);
        $product_ids = $request->product_ids;
        $product_quantities = $request->product_quantities;
        // dd($product_quantities);
        foreach ($product_ids as $product_id) {
            $data = array('order_id'=>$order->id, 'product_id'=>$product_id, 'quantity'=>$product_quantities[$product_id]);
            $this->order_detail_ctl->create($data);
        }
        return $order;
    }

    public function delete(Request $request)
    {
        $response = $this->order_service->delete($request->id);
        return $response;
    }

    // public function update(Request $request)
    // {
    //     $response = $order_service->update($request->all());
    //     return $response;
    // }

    public static function getOrderById($id)
    {
        return self::order_service->get($id);
    }

    public function getOrders()
    {
        return $this->order_service->getAll();
    }
}