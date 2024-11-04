<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Requests\BillDetailStoreRequest;
use App\Http\Requests\BillDetailUpdateRequest;
use App\Interface\Service\BillDetailServiceInterface;

class BillDetailController
{
    private $billDetailService;

    public function __construct(BillDetailServiceInterface $billDetailService)
    {
        $this->billDetailService = $billDetailService;
    }

    // Fetch all bill details for a specific bill
    public function index()
    {
        return $this->billDetailService->findBillDetails();
    }

    // Create a new bill detail
    public function store(BillDetailStoreRequest $request)
    {
        return $this->billDetailService->createBillDetails($request);
    }

    // Fetch a single bill detail by ID
    public function show(int $id)
    {
        return $this->billDetailService->findBillDetailById($id);
    }

    // Update an existing bill detail
    public function update(BillDetailUpdateRequest $request, int $id)
    {
        return $this->billDetailService->updateBillDetails($request, $id);
    }

    // Delete a bill detail by ID
    public function destroy(int $id)
    {
        return $this->billDetailService->removeBillDetails($id);
    }
}
