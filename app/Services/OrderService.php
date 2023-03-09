<?php

namespace App\Services;

use App\Repositories\OrderRepository;
use App\Services\ResponseService;
use App\Http\Controllers\OrderMailController;
use Throwable;

class OrderService
{

    public $orderRepo;
    public $responseService;

    public function __construct()
    {
        $this->orderRepo = new OrderRepository();
        $this->responseService = new ResponseService();
    }

    public function create($data)
    {
        return $this->orderRepo->create($data);
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
