<?php

namespace App\Services;

use App\Models\Product;
use App\Repositories\OrderRepository;
use App\Services\ResponseService;
use App\Http\Controllers\OrderMailController;
use Throwable;

class OrderService
{

    private $orderRepo;
    private $orderInstance;
    private $responseService;
    private $calShipping;
    private  $shippingFee;
    const SHIPPING_FLAT_RATE = 0;
    const SHIPPING_FREE_SHIPPING = 1;
    const SHIPPING_LOCAL_PICKUP = 2;
    const PAYMENT_METHOD_CHECK_PAYMENTS = 0;
    const PAYMENT_METHOD_COD = 1;

    public function __construct()
    {
        $this->orderRepo = new OrderRepository();
        $this->responseService = new ResponseService();
        $this->calShipping = self::SHIPPING_FLAT_RATE;
        $this->total_money = 0;
    }
    public function calculateShipping() {
        if ($this->total_money > 2000) {
            $this->calShipping = self::SHIPPING_FREE_SHIPPING;
        } else {
            $this->shippingFee = min(30, $this->total_money * .02);
        }
    }
    public function create($data)
    {
        $order_data = collect($data)->except(['product_ids', 'product_quantities'])->all();
        $this->orderInstance = $this->orderRepo->create($order_data);
        $product_quantities = $data['product_quantities'];
        foreach ($data['product_ids'] as $product_id) {
            $this->orderInstance->details()->create([
                'product_id'=> $product_id,
                'quantity'=>$product_quantities[$product_id]
            ]);
        }
        foreach($this->orderInstance->details as $detail) {
            $this->total_money += Product::find($detail->product_id)->price * $detail->quantity;
        }
        $this->calculateShipping();
        if ($this->calShipping != self::SHIPPING_FREE_SHIPPING) {
            $this->total_money += $this->shippingFee;
        }
        $this->orderInstance->update(['total_money'=>$this->total_money]);
        if ($data['payment_method'] == self::PAYMENT_METHOD_CHECK_PAYMENTS) {

        } else {

        }
        return $this->orderInstance;
    }

    public function getPaymentLink()
    {
        return ['code'=>$this->orderInstance->id, 'url'=>route('payment.ui', ['code'=>$this->orderInstance->id]), 'total_money'=>$this->orderInstance->total_money];
    }

    public function delete($id)
    {
        return $this->orderRepo->delete($id);
    }

    public function get($id)
    {
        return $this->orderRepo->get($id);
    }

    public function getAll()
    {
        return $this->orderRepo->getAll();
    }
}
