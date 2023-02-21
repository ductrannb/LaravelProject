<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Payme\ApiService;
use App\Models\Order;

class PaymentController extends Controller
{

    public function response(bool $success, string $message)
    {
        return array('success' => $success, 'message' => $message);
    }

    public function index()
    {
        echo '<pre>';
        $payload = array(
            'partnerTransaction' => '1523695648',
            'desc' => 'Thanh toán giao dịch',
            'ipnUrl' => 'duc.local/ipn',
            'redirectUrl' => 'duc.local/success',
            'failedUrl' => 'duc.local/fail',
            'amount' => 10000
        );

        $domain = 'https://sbx-gapi.payme.vn';
        $xApiClient = '28209420';
        $secretKey = '24961f69cb337f08b63457317d5c97b5';

        $apiService = new ApiService('', $xApiClient, $secretKey, $domain);
        $result = $apiService->createPaymentWeb($payload);
        print_r($result);

        echo '<br>';
        $payloadQuery = array(
            'partnerTransaction' => '1523695648',
        );
        $resultQuery = $apiService->query($payloadQuery);
        print_r($resultQuery);

        echo '<br>';
        $payloadRefund = array(
            'partnerTransaction' => '8965314569',
            'transaction' => '5838702517',
            'reason' => 'Hết voucher',
            'amount' => 10000
        );
        $resultRefund = $apiService->refund($payloadRefund);
        print_r($resultRefund);
    }

    public function create(Request $request)
    {
        try {
            $x = Order::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'company_name' => $request->company_name,
                'country' => $request->company_name,
                'address' => $request->address,
                'address2' => $request->address2,
                'town' => $request->town,
                'state' => $request->state,
                'zip' => $request->zip,
                'phone' => $request->phone,
                'email' => $request->email,
                'create_account' => $request->create_account ? '1' : '0',
                'ship_to_address' => $request->ship_to_address ? '1' : '0',
                'order_note' =>  $request->order_note ? $request->order_note : '',
                'cal_shipping' => $request->cal_shipping,
                'payment_method' => $request->payment_method,
                'last_confirm' => $request->last_confirm ? '1' : '0'
            ]);
            $response = array("success" => true, "message" => "Create order successfully!");
        } catch(\Throwable $e) {
            $response = array("success" => false, "message" => $e->getMessage());
        }
    }

    public function delete(Request $request)
    {
        try {
            $order = Order::find($request->id);
            $order->delete();
        } catch (\Throwable $e) {
            return $this->response(false, $e->getMessage());
        }
        return $this->response(true, 'Delete order successfully!');
    }

    public function update(Request $request)
    {
        try {

        } catch (\Throwable $e){

        }
    }

    public function getOrderById($id)
    {
        try {

        } catch (\Throwable $e){

        }
    }

    public function getOrders()
    {
        return Order::All();
    }
}