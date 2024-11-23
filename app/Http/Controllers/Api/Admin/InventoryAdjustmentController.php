<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Requests\InventoryAdjustmentStoreRequest;
use App\Http\Requests\InventoryAdjustmentUpdateRequest;
use App\Interface\Service\InventoryAdjustmentServiceInterface;
use Illuminate\Http\Request;

class InventoryAdjustmentController
{
    private $inventoryAdjustmentService;

    public function __construct(InventoryAdjustmentServiceInterface $inventoryAdjustmentService)
    {
        $this->inventoryAdjustmentService = $inventoryAdjustmentService;
    }

    public function index(Request $request)
    {
        return $this->inventoryAdjustmentService->findInventoryAdjustments($request);
    }

    public function store(InventoryAdjustmentStoreRequest $request)
    {
        return $this->inventoryAdjustmentService->createInventoryAdjustment($request);
    }

    public function show(int $inventoryAdjustmentId)
    {
        return $this->inventoryAdjustmentService->findInventoryAdjustmentById($inventoryAdjustmentId);
    }

    public function update(InventoryAdjustmentUpdateRequest $request, int $inventoryAdjustmentId)
    {
        return $this->inventoryAdjustmentService->updateInventoryAdjustment($request, $inventoryAdjustmentId);
    }

    public function destroy(int $inventoryAdjustmentId)
    {
        return $this->inventoryAdjustmentService->removeInventoryAdjustment($inventoryAdjustmentId);
    }
}
