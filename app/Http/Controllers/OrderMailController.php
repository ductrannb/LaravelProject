<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Mail\OrderMail;
use Illuminate\Support\Facades\Mail;

class OrderMailController extends Controller
{
    public function sendMail($order)
    {
        Mail::to($order->email)->send(new OrderMail($order));
    }
}
