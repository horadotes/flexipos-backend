<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Requests\SupplierReturnDetailStoreRequest;
use App\Http\Requests\SupplierReturnDetailUpdateRequest;
use App\Interface\Service\SupplierReturnDetailServiceInterface;

class SupplierReturnDetailController
{
    private $supplierReturnDetailService;

    public function __construct(SupplierReturnDetailServiceInterface $supplierReturnDetailService)
    {
        $this->supplierReturnDetailService = $supplierReturnDetailService;
    }

    public function index()
    {
        return $this->supplierReturnDetailService->findSupplierReturnDetails();
    }

    public function store(SupplierReturnDetailStoreRequest $request)
    {
        return $this->supplierReturnDetailService->createSupplierReturnDetail($request);
    }

    public function show(int $supplierReturnDetailID)
    {
        return $this->supplierReturnDetailService->findSupplierReturnDetailById($supplierReturnDetailID);
    }

    public function update(SupplierReturnDetailUpdateRequest $request, int $supplierReturnDetailID)
    {
        return $this->supplierReturnDetailService->updateSupplierReturnDetail($request, $supplierReturnDetailID);
    }

    public function destroy(int $supplierReturnDetailID)
    {
        return $this->supplierReturnDetailService->removeSupplierReturnDetail($supplierReturnDetailID);
    }
}
