<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Requests\PaymentChequeStoreRequest;
use App\Http\Requests\PaymentChequeUpdateRequest;
use App\Interface\Service\PaymentChequeServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PaymentChequeController extends Controller
{
    private $paymentChequeService;

    public function __construct(PaymentChequeServiceInterface $paymentChequeService)
    {
        $this->paymentChequeService = $paymentChequeService;
    }

    public function index(Request $request)
    {
        return $this->paymentChequeService->findPaymentCheques($request);
    }

    public function store(PaymentChequeStoreRequest $request)
    {
        return $this->paymentChequeService->createPaymentCheque($request);
    }

    public function show(int $paymentChequeId)
    {
        return $this->paymentChequeService->findPaymentChequeById($paymentChequeId);
    }

    public function update(PaymentChequeUpdateRequest $request, int $paymentChequeId)
    {
        return $this->paymentChequeService->updatePaymentCheque($request, $paymentChequeId);
    }

    public function destroy(int $paymentChequeId)
    {
        return $this->paymentChequeService->removePaymentCheque($paymentChequeId);
    }
}
