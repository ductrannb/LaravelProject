<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\OrderDetailService;

class OrderDetailController extends Controller
{
    private $order_detail_service;

    public function __construct(OrderDetailService $order_detail_service)
    {
        $this->order_detail_service = $order_detail_service;
    }

    public function create(array $data)
    {
        return $this->order_detail_service->create($data);
    }
}
