<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Requests\BillPaymentChequeStoreRequest;
use App\Http\Requests\BillPaymentChequeUpdateRequest;
use App\Interface\Service\BillPaymentChequeServiceInterface;
use Illuminate\Routing\Controller;

class BillPaymentChequeController extends Controller
{
    private $billPaymentChequeService;

    public function __construct(BillPaymentChequeServiceInterface $billPaymentChequeService)
    {
        $this->billPaymentChequeService = $billPaymentChequeService;
    }

    public function index()
    {
        return $this->billPaymentChequeService->findBillsPaymentCheques();
    }

    public function show(int $id)
    {
        return $this->billPaymentChequeService->findBillsPaymentChequeById($id);
    }

    public function store(BillPaymentChequeStoreRequest $request)
    {
        return $this->billPaymentChequeService->createBillsPaymentCheque($request);
    }

    public function update(BillPaymentChequeUpdateRequest $request, int $id)
    {
        return $this->billPaymentChequeService->updateBillsPaymentCheque($request, $id);
    }

    public function destroy(int $id)
    {
        return $this->billPaymentChequeService->removeBillsPaymentCheque($id);
    }
}
