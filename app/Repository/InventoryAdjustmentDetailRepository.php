<?php

namespace App\Repository;

use App\Interface\Repository\InventoryAdjustmentDetailRepositoryInterface;
use App\Models\InventoryAdjustmentDetail;

class InventoryAdjustmentDetailRepository implements InventoryAdjustmentDetailRepositoryInterface
{
    public function findMany()
    {
        return InventoryAdjustmentDetail::all();
    }

    public function findOneById(int $id)
    {
        return InventoryAdjustmentDetail::findOrFail($id);
    }

    public function create(object $payload)
    {
        $inventoryAdjustmentDetail = new InventoryAdjustmentDetail();
        $inventoryAdjustmentDetail->inventory_adjustment_id = $payload->inventory_adjustment_id;
        $inventoryAdjustmentDetail->product_id = $payload->product_id;
        $inventoryAdjustmentDetail->unit = $payload->unit;
        $inventoryAdjustmentDetail->expiry_date = $payload->expiry_date;
        $inventoryAdjustmentDetail->quantity = $payload->quantity;
        $inventoryAdjustmentDetail->remarks = $payload->remarks;
        $inventoryAdjustmentDetail->save();

        return $inventoryAdjustmentDetail->fresh();
    }

    public function update(object $payload, int $id)
    {
        $inventoryAdjustmentDetail = InventoryAdjustmentDetail::findOrFail($id);
        $inventoryAdjustmentDetail->inventory_adjustment_id = $payload->inventory_adjustment_id;
        $inventoryAdjustmentDetail->product_id = $payload->product_id;
        $inventoryAdjustmentDetail->unit = $payload->unit;
        $inventoryAdjustmentDetail->expiry_date = $payload->expiry_date;
        $inventoryAdjustmentDetail->quantity = $payload->quantity;
        $inventoryAdjustmentDetail->remarks = $payload->remarks;
        $inventoryAdjustmentDetail->save();

        return $inventoryAdjustmentDetail->fresh();
    }

    public function delete(int $id)
    {
        $inventoryAdjustmentDetail = InventoryAdjustmentDetail::findOrFail($id);
        $inventoryAdjustmentDetail->delete();

        return true;
    }
}
