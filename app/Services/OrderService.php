<?php

namespace App\Services;

use App\Repositories\OrderRepository;
use App\Services\ResponseService;
use App\Http\Controllers\OrderMailController;
use Throwable;

class OrderService
{

    public $orderRepo;
    public $orderInstance;
    public $responseService;
    public $calShipping;
    const SHIPPING_FLAT_RATE = 0;
    const SHIPPING_FREE_SHIPPING = 1;
    const SHIPPING_LOCAL_PICKUP = 2;
    public function __construct()
    {
        $this->orderRepo = new OrderRepository();
        $this->responseService = new ResponseService();
        $this->calShipping = self::SHIPPING_FLAT_RATE;
        $this->totalPayment = 0;
    }
    public function calculateShipping() {
        if ($this->totalPayment > 2000) {
            $this->calShipping = self::SHIPPING_FREE_SHIPPING;
        } else {
            $this->shippingFee = min(30, $this->totalPayment * .2);
        }
    }
    public function create($data)
    {
        $this->orderInstance = $this->orderRepo->create($data);
        $product_quantities = $data['product_quantities'];
        foreach ($data['product_ids'] as $product_id) {
            $this->orderInstance->details()->create([
                'product_id'=> $product_id,
                'quantity'=>$product_quantities[$product_id]
            ]);
        }
        foreach($this->orderInstance->details as $detail) {
            $this->totalPayment += $detail->product->price * $detail->quantity;
        }
        $this->calculateShipping();
        return $this->orderInstance;
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
