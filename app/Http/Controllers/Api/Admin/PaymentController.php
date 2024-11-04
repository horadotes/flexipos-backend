<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Requests\PaymentStoreRequest;
use App\Http\Requests\PaymentUpdateRequest;
use App\Interface\Service\PaymentServiceInterface;
use Illuminate\Http\Request;

class PaymentController
{
    private $paymentService;

    public function __construct(PaymentServiceInterface $paymentService)
    {
        $this->paymentService = $paymentService;
    }

    public function index(Request $request)
    {
        return $this->paymentService->findPayments($request);
    }

    public function store(PaymentStoreRequest $request)
    {
        return $this->paymentService->createPayment($request);
    }

    public function show(int $paymentId)
    {
        return $this->paymentService->findPaymentById($paymentId);
    }

    public function update(PaymentUpdateRequest $request, int $paymentId)
    {
        return $this->paymentService->updatePayment($request, $paymentId);
    }

    public function destroy(int $paymentId)
    {
        return $this->paymentService->removePayment($paymentId);
    }
}
