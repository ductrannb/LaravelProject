<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use App\Services\OrderService;
use App\Services\ProductService;
use App\Http\Requests\StoreOrderRequest;
use App\Notifications\OrderNoti;

class PaymentController extends Controller
{

    private OrderService $order_service;
    private ProductService $product_service;
    private OrderDetailController $order_detail_ctl;

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

    public function showPaymentUI()
    {
        $order = Order::findOrfail(request('code'));
        return view('order.payment', compact('order'));
    }

    public function create(StoreOrderRequest $request)
    {
        try {
            $create_account = $request->boolean('create_account') ? 1 : 0;
            $ship_to_address = $request->boolean('ship_to_address') ? 1 : 0;
            $last_confirm = $request->boolean('last_confirm') ? 1 : 0;
            $request->merge(array('create_account'=>$create_account, 'ship_to_address'=>$ship_to_address, 'last_confirm'=>$last_confirm));
            $order = $this->order_service->create($request->all());
            //Gui email, notifications
            auth()->user()->notify(new OrderNoti ($order));
            return response()->json($this->order_service->getPaymentLink());
        }
        catch (\Throwable $throw) {
            return response()->json(['status'=>'error', 'message'=>$throw->getMessage()]);
        }
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

    public function getOrderById($id)
    {
        return $this->order_service->get($id);
    }

    public function getOrders()
    {
        return $this->order_service->getAll();
    }
}
