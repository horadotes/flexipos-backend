<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Requests\BillPaymentStoreRequest;
use App\Http\Requests\BillPaymentUpdateRequest;
use App\Interface\Service\BillPaymentServiceInterface;
use Illuminate\Routing\Controller;

class BillPaymentController extends Controller
{
    private $billPaymentService;

    public function __construct(BillPaymentServiceInterface $billPaymentService)
    {
        $this->billPaymentService = $billPaymentService;
    }

    public function index()
    {
        return $this->billPaymentService->findBillsPayment();
    }

    public function show(int $id)
    {
        return $this->billPaymentService->findBillsPaymentById($id);
    }

    public function store(BillPaymentStoreRequest $request)
    {
        return $this->billPaymentService->createBillsPayment($request);
    }

    public function update(BillPaymentUpdateRequest $request, int $id)
    {
        return $this->billPaymentService->updateBillsPayment($request, $id);
    }

    public function destroy(int $id)
    {
        return $this->billPaymentService->removeBillsPayment($id);
    }
}
