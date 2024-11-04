<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Requests\BillStoreRequest;
use App\Http\Requests\BillUpdateRequest;
use App\Interface\Service\BillServiceInterface;

class BillController
{
    private $billService;

    public function __construct(BillServiceInterface $billService)
    {
        $this->billService = $billService;
    }

    // Fetch all bills
    public function index()
    {
        return $this->billService->findBills();
    }

    // Create a new bill
    public function store(BillStoreRequest $request)
    {
        return $this->billService->createBills($request);
    }

    // Fetch a single bill by ID
    public function show(int $billId)
    {
        return $this->billService->findBillById($billId);
    }

    // Update an existing bill
    public function update(BillUpdateRequest $request, int $billId)
    {
        return $this->billService->updateBills($request, $billId);
    }

    // Delete a bill by ID
    public function destroy(int $billId)
    {
        return $this->billService->removeBills($billId);
    }
}
