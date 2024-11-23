<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Requests\InventoryAdjustmentDetailStoreRequest;
use App\Http\Requests\InventoryAdjustmentDetailUpdateRequest;
use App\Interface\Service\InventoryAdjustmentDetailServiceInterface;
use GuzzleHttp\Psr7\Request;

class InventoryAdjustmentDetailController
{
    private $inventoryAdjustmentDetailService;

    public function __construct(InventoryAdjustmentDetailServiceInterface $inventoryAdjustmentDetailService)
    {
        $this->inventoryAdjustmentDetailService = $inventoryAdjustmentDetailService;
    }

    public function index(Request $request)
    {
        return $this->inventoryAdjustmentDetailService->findInventoryAdjustmentDetails($request);
    }

    public function store(InventoryAdjustmentDetailStoreRequest $request)
    {
        return $this->inventoryAdjustmentDetailService->createInventoryAdjustmentDetail($request);
    }

    public function show(int $inventoryAdjustmentDetailId)
    {
        return $this->inventoryAdjustmentDetailService->findInventoryAdjustmentDetailById($inventoryAdjustmentDetailId);
    }

    public function update(InventoryAdjustmentDetailUpdateRequest $request, int $inventoryAdjustmentDetailId)
    {
        return $this->inventoryAdjustmentDetailService->updateInventoryAdjustmentDetail($request, $inventoryAdjustmentDetailId);
    }

    public function destroy(int $inventoryAdjustmentDetailId)
    {
        return $this->inventoryAdjustmentDetailService->removeInventoryAdjustmentDetail($inventoryAdjustmentDetailId);
    }
}
