<?php

namespace App\Repositories;

use App\Models\Order;
use App\Services\ResponseService;

class OrderRepository
{
    public $responseService;

    public function __construct()
    {
        $this->responseService = new ResponseService();
    }

    public function create($data)
    {
        return Order::create($data);
    }

    public function delete($id)
    {
        try {
            $order = Order::find($id);
            $order->delete();
        } catch (Throwable $e) {
            return $this->responseService->response(false, $e->getMessage());
        }
        return $this->responseService->response(true, 'Delete order successfully!');
    }

    public function get($id)
    {
        return Order::Find($id);
    }

    public function getAll()
    {
        return Order::All();
    }
}