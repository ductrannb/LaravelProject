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

    // public function __construct(OrderRepository $orderRepo)
    // {
    //     $this->orderRepo = $orderRepo;
    // }

    public function create($data)
    {
        try {
            $x = $this->orderRepo->create($data);
            // dd($x);
            $response = $this->responseService->response(true, "Create order successfully!");
            $mail = new OrderMailController();
            $mail->sendMail($x);
        } catch(Exception $e) {
            $response = $this->responseService->response(false, $e->getMessage());
        }
        return $response;
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
