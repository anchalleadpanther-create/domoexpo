<?php
namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Str;

class JccService
{
    protected $client;
    protected $baseUrl;
    protected $username;
    protected $password;

    public function __construct()
    {
        $this->baseUrl  = rtrim(env('JCC_BASE_URL'), '/');
        $this->username = env('JCC_USERNAME');
        $this->password = env('JCC_PASSWORD');

        $this->client = new Client([
            'base_uri' => $this->baseUrl . '/',
            'timeout'  => 20,
        ]);
    }

    /**
     * Create order and get formUrl
     */
    public function createOrder($amount, $currency = '978', $orderNumber = null)
    {
        $orderNumber = $orderNumber ?? 'ORDER-' . strtoupper(Str::random(10));
        $minorAmount = (int) round(((float)$amount) * 100);

        $postData = [
            'userName'   => $this->username,
            'password'   => $this->password,
            'orderNumber'=> $orderNumber,
            'amount'     => $minorAmount,
            'currency'   => $currency,
            'returnUrl'  => env('JCC_RETURN_URL'),
            'failUrl'    => env('JCC_FAIL_URL'),
            'language'   => 'en',
        ];

        try {
            $response = $this->client->post("register.do", [
                'form_params' => $postData,
                'headers' => [
                    'Content-Type' => 'application/x-www-form-urlencoded'
                ],
            ]);

            $body = json_decode($response->getBody(), true);

            return $body;   // formUrl + orderId

        } catch (\Throwable $e) {
            return [
                'error' => true,
                'message' => $e->getMessage()
            ];
        }
    }


    /**
     * Check JCC Order Status
     */
    public function getOrderStatus($orderId)
    {
        try {
            $response = $this->client->post("getOrderStatusExtended.do", [
                'form_params' => [
                    'userName' => $this->username,
                    'password' => $this->password,
                    'orderId'  => $orderId,
                ]
            ]);

            return json_decode($response->getBody(), true);

        } catch (\Throwable $e) {
            return [
                'error' => true,
                'message' => $e->getMessage()
            ];
        }
    }
}
