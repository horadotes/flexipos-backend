<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Requests\PaymentDetailStoreRequest;
use App\Http\Requests\PaymentDetailUpdateRequest;
use App\Interface\Service\PaymentDetailServiceInterface;
use Illuminate\Http\Request;

class PaymentDetailController
{
    private $paymentDetailService;

    public function __construct(PaymentDetailServiceInterface $paymentDetailService)
    {
        $this->paymentDetailService = $paymentDetailService;
    }

    public function index(Request $request)
    {
        return $this->paymentDetailService->findPaymentDetails($request);
    }

    public function store(PaymentDetailStoreRequest $request)
    {
        return $this->paymentDetailService->createPaymentDetail($request);
    }

    public function show(int $paymentDetailId)
    {
        return $this->paymentDetailService->findPaymentDetailById($paymentDetailId);
    }

    public function update(PaymentDetailUpdateRequest $request, int $paymentDetailId)
    {
        return $this->paymentDetailService->updatePaymentDetail($request, $paymentDetailId);
    }

    public function destroy(int $paymentDetailId)
    {
        return $this->paymentDetailService->removePaymentDetail($paymentDetailId);
    }
}
