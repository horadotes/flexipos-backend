<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Requests\BillPaymentDetailStoreRequest;
use App\Http\Requests\BillPaymentDetailUpdateRequest;
use App\Interface\Service\BillPaymentDetailServiceInterface;
use Illuminate\Routing\Controller;

class BillPaymentDetailController extends Controller
{
    private $billPaymentDetailService;

    public function __construct(BillPaymentDetailServiceInterface $billPaymentDetailService)
    {
        $this->billPaymentDetailService = $billPaymentDetailService;
    }

    public function index()
    {
        return $this->billPaymentDetailService->findBillsPaymentDetails();
    }

    public function show(int $id)
    {
        return $this->billPaymentDetailService->findBillsPaymentDetailById($id);
    }

    public function store(BillPaymentDetailStoreRequest $request)
    {
        return $this->billPaymentDetailService->createBillsPaymentDetail($request);
    }

    public function update(BillPaymentDetailUpdateRequest $request, int $id)
    {
        return $this->billPaymentDetailService->updateBillsPaymentDetail($request, $id);
    }

    public function destroy(int $id)
    {
        return $this->billPaymentDetailService->removeBillsPaymentDetail($id);
    }
}
