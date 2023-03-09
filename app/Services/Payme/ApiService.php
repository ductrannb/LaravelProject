<?php
namespace App\Services\Payme;

class ApiService
{
  public function __construct($authorization = '', $xApiClient = '', $secretKey = '', $paymeUrl = '')
  {
    $this->authorization = $authorization;
    $this->xApiClient = $xApiClient;
    $this->secretKey = $secretKey;
    $this->paymeUrl = $paymeUrl;
    $this->CREATE_PAYMENT_SUCCEEDED = 105000;
    $this->QUERY_ORDER_SUCCEEDED = 105002;
    $this->REFUND_ORDER_SUCCEEDED = 105003;
  }

  public function createPaymentWeb($payload = [])
  {
    try {
      $objValidate = [
        'pathUrl' => '/payment/web',
        'method'  => 'POST',
        "authorization" => $this->authorization,
        "body" => stripslashes(json_encode($payload, JSON_UNESCAPED_UNICODE | JSON_FORCE_OBJECT))
      ];
      $curl = curl_init();
      curl_setopt_array($curl, array(
        CURLOPT_URL => $this->paymeUrl . $objValidate['pathUrl'],
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_HEADER => 1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => json_encode($payload),
        CURLOPT_HTTPHEADER => array(
          "authorization: " . $this->authorization,
          'x-api-client:' . $this->xApiClient,
          'x-api-validate:' . md5(implode('', $objValidate) . $this->secretKey),
          'Content-Type: application/json; charset=utf-8'
        ),
      ));
      $response = curl_exec($curl);

      $header_size = curl_getinfo($curl, CURLINFO_HEADER_SIZE);
      $body = substr($response, $header_size);
      $result = json_decode($body, true);
      if ($result['code'] === $this->CREATE_PAYMENT_SUCCEEDED) {
        return $result;
      } else {
        return 'Error Request :>> ' . $result['message'];
      }
    } catch (Exception $e) {
      return $e;
    }
  }

  public function createPaymentQR($payload = [])
  {
    try {
      $objValidate = [
        'pathUrl' => '/payment/qr',
        'method'  => 'POST',
        "authorization" => $this->authorization,
        "body" => stripslashes(json_encode($payload, JSON_UNESCAPED_UNICODE |  JSON_FORCE_OBJECT))
      ];
      $curl = curl_init();
      curl_setopt_array($curl, array(
        CURLOPT_URL => $this->paymeUrl . $objValidate['pathUrl'],
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_HEADER => 1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => json_encode($payload),
        CURLOPT_HTTPHEADER => array(
          "authorization: " . $this->authorization,
          'x-api-client:' . $this->xApiClient,
          'x-api-validate:' . md5(implode('', $objValidate) . $this->secretKey),
          'Content-Type: application/json; charset=utf-8'
        ),
      ));
      $response = curl_exec($curl);

      $header_size = curl_getinfo($curl, CURLINFO_HEADER_SIZE);
      $body = substr($response, $header_size);
      $result = json_decode($body, true);
      if ($result['code'] === $this->CREATE_PAYMENT_SUCCEEDED) {
        // success
        return $result;
      } else {
        return 'Error Request :>> ' . $result['message'];
      }
    } catch (Exception $e) {
      return $e;
    }
  }

  public function query($payload = [])
  {
    try {
      $objValidate = [
        'pathUrl' => '/payment/query',
        'method'  => 'POST',
        "authorization" => $this->authorization,
        "body" => stripslashes(json_encode($payload, JSON_UNESCAPED_UNICODE | JSON_FORCE_OBJECT))
      ];
      $curl = curl_init();
      curl_setopt_array($curl, array(
        CURLOPT_URL => $this->paymeUrl . $objValidate['pathUrl'],
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_HEADER => 1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => json_encode($payload),
        CURLOPT_HTTPHEADER => array(
          "authorization: " . $this->authorization,
          'x-api-client:' . $this->xApiClient,
          'x-api-validate:' . md5(implode('', $objValidate) . $this->secretKey),
          'Content-Type: application/json; charset=utf-8'
        ),
      ));
      $response = curl_exec($curl);

      $header_size = curl_getinfo($curl, CURLINFO_HEADER_SIZE);
      $body = substr($response, $header_size);
      $result = json_decode($body, true);
      if ($result['code'] === $this->QUERY_ORDER_SUCCEEDED) {
        // success
        return $result;
      } else {
        return 'Error Request :>> ' . $result['message'];
      }
    } catch (Exception $e) {
      return $e;
    }
  }

  public function refund($payload = [])
  {
    try {
      $objValidate = [
        'pathUrl' => '/payment/refund',
        'method'  => 'POST',
        "authorization" => $this->authorization,
        "body" => (json_encode($payload, JSON_UNESCAPED_UNICODE | JSON_FORCE_OBJECT))
      ];
      $curl = curl_init();
      curl_setopt_array($curl, array(
        CURLOPT_URL => $this->paymeUrl . $objValidate['pathUrl'],
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_HEADER => 1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => json_encode($payload),
        CURLOPT_HTTPHEADER => array(
          "authorization: " . $this->authorization,
          'x-api-client:' . $this->xApiClient,
          'x-api-validate:' . md5(implode('', $objValidate) . $this->secretKey),
          'Content-Type: application/json; charset=utf-8'
        ),
      ));
      $response = curl_exec($curl);

      $header_size = curl_getinfo($curl, CURLINFO_HEADER_SIZE);
      $body = substr($response, $header_size);
      $result = json_decode($body, true);
      if ($result['code'] === $this->REFUND_ORDER_SUCCEEDED) {
        // success
        return $result;
      } else {
        return 'Error Request :>> ' . $result['message'];
      }
    } catch (Exception $e) {
      return $e;
    }
  }

  public function checksumIPN($validate, $payload = [], $payUrl = '')
  {
    try {
      $result = [
        'code' => -1,
        'message' => 'Check Sum Faile'
      ];
      $objValidate = [
        "body" => stripslashes(json_encode($payload, JSON_UNESCAPED_UNICODE | JSON_FORCE_OBJECT))
      ];
      print_r(md5(implode('', $objValidate) . $this->secretKey));
      if ($validate !== md5(implode('', $objValidate) . $this->secretKey)) {
        return $result;
      }
      $result['code'] = 1;
      $result['message'] = 'SUCCESS';
      return $result;
    } catch (Exception $e) {
      return $e;
    }
  }
}
