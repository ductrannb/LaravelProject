<?php

namespace App\Services;

use App\Repositories\OrderDetailRepository;

class OrderDetailService
{
    private $order_detail_repo;

    public function __construct(OrderDetailRepository $order_detail_repo)
    {
        $this->order_detail_repo = $order_detail_repo;
    }

    public function create(array $data)
    {
        return $this->order_detail_repo->create($data);
    }
}