<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Requests\SupplierReturnStoreRequest;
use App\Http\Requests\SupplierReturnUpdateRequest;
use App\Interface\Service\SupplierReturnServiceInterface;

class SupplierReturnController
{
    private $supplierReturnService;

    public function __construct(SupplierReturnServiceInterface $supplierReturnService)
    {
        $this->supplierReturnService = $supplierReturnService;
    }

    public function index()
    {
        return $this->supplierReturnService->findSupplierReturns();
    }

    public function store(SupplierReturnStoreRequest $request)
    {
        return $this->supplierReturnService->createSupplierReturn($request);
    }

    public function show(int $supplierReturnID)
    {
        return $this->supplierReturnService->findSupplierReturnById($supplierReturnID);
    }

    public function update(SupplierReturnUpdateRequest $request, int $supplierReturnID)
    {
        return $this->supplierReturnService->updateSupplierReturn($request, $supplierReturnID);
    }

    public function destroy(int $supplierReturnID)
    {
        return $this->supplierReturnService->removeSupplierReturn($supplierReturnID);
    }
}
