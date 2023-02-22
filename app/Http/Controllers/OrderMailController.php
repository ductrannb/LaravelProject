<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
// use App\Mail\OrderMail;
// use Illuminate\Support\Facades\Mail;
use App\Jobs\SendOrderEmail;

class OrderMailController extends Controller
{
    public function sendMail($order)
    {
        $emailJob = new SendOrderEmail($order);
        dispatch($emailJob);
    }
}
