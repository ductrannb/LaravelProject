<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Payme\ApiService;
use App\Models\Payment;

class PaymentController extends Controller
{
    public function index()
    {
        echo '<pre>';
        $payload = array(
            'partnerTransaction' => '1523695648',
            'desc' => "Thanh toán giao dịch",
            'ipnUrl' => "duc.local/ipn",
            'redirectUrl' => "duc.local/success",
            'failedUrl' => "duc.local/fail",
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
            'transaction' => "5838702517",
            'reason' => "Hết voucher",
            'amount' => 10000
        );
        $resultRefund = $apiService->refund($payloadRefund);
        print_r($resultRefund);
    }
    public function create()
    {
        try {
            $x = Payment::create([
                'first_name' => $_POST['first_name'],
                'last_name' => $_POST['last_name'],
                'company_name' => $_POST['company_name'],
                'country' => $_POST['company_name'],
                'address' => $_POST['address'],
                'address2' => $_POST['address2'],
                'town' => $_POST['town'],
                'state' => $_POST['state'],
                'zip' => $_POST['zip'],
                'phone' => $_POST['phone'],
                'email' => $_POST['email'],
                'create_account' => isset($_POST['create_account']) ? '1' : '0',
                'ship_to_address' => isset($_POST['ship_to_address']) ? '1' : '0',
                'order_note' => $_POST['order_note'],
                'cal_shipping' => $_POST['cal_shipping'],
                'payment_method' => $_POST['payment_method'],
                'last_confirm' => isset($_POST['last_confirm']) ? '1' : '0'
            ]);
            $response = array("success" => true, "message" => "Create order successfully!");
        } catch(Exception $e) {
            $response = array("success" => false, "message" => $e->getMessage());
        }
        return $response;
    }
}