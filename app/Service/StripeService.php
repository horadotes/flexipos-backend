<?php

namespace App\Service;

use App\Interface\Service\StripeServiceInterface;
use Illuminate\Support\Facades\Http;

class StripeService implements StripeServiceInterface
{
    private $secretKey;

    private $basicPriceId;

    private $proPriceId;

    private $successUrl;

    private $cancelUrl;

    public function __construct()
    {
        $this->secretKey = config('stripe.secret_key');
        $this->basicPriceId = config('stripe.basic_price');
        $this->proPriceId = config('stripe.pro_price');
        $this->successUrl = 'http://localhost:3000/success';
        $this->cancelUrl = 'http://localhost:3000/';
    }

    public function createPayment(object $payload)
    {
        $plan = ($payload->plan === 'basic') ? $this->basicPriceId : $this->proPriceId;

        try {
            $response = Http::withBasicAuth($this->secretKey, '')
                ->asForm()
                ->post('https://api.stripe.com/v1/checkout/sessions', [
                    'success_url' => $this->successUrl,
                    'cancel_url' => $this->cancelUrl,
                    'line_items[0][price]' => $plan,
                    'line_items[0][quantity]' => 1,
                    'mode' => 'subscription',
                ]);

            if ($response->successful()) {
                return [
                    'status' => 'success',
                    'data' => $response->json(),
                ];
            } else {
                return [
                    'status' => 'error',
                    'message' => $response->json()['error']['message'] ?? 'Something went wrong.',
                ];
            }
        } catch (\Exception $e) {
            return [
                'status' => 'error',
                'message' => $e->getMessage(),
            ];
        }
    }

    public function verifyPayment(object $payload)
    {
        //
    }
}
