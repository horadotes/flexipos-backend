<?php

namespace App\Repository;

use App\Interface\Repository\InventoryAdjustmentRepositoryInterface;
use App\Models\InventoryAdjustment;

class InventoryAdjustmentRepository implements InventoryAdjustmentRepositoryInterface
{
    public function findMany()
    {
        return InventoryAdjustment::all();
    }

    public function findOneById(int $id)
    {
        return InventoryAdjustment::findOrFail($id);
    }

    public function create(object $payload)
    {
        $inventoryAdjustment = new InventoryAdjustment();
        $inventoryAdjustment->prepared_by_id = $payload->prepared_by_id;
        $inventoryAdjustment->approved_by_id = $payload->approved_by_id;
        $inventoryAdjustment->cancelled_by_id = $payload->cancelled_by_id;
        $inventoryAdjustment->branch_number = $payload->branch_number;
        $inventoryAdjustment->adjustment_date = $payload->adjustment_date;
        $inventoryAdjustment->remarks = $payload->remarks;
        $inventoryAdjustment->is_cancelled = $payload->is_cancelled;
        $inventoryAdjustment->save();

        return $inventoryAdjustment->fresh();
    }

    public function update(object $payload, int $id)
    {
        $inventoryAdjustment = InventoryAdjustment::findOrFail($id);
        $inventoryAdjustment->prepared_by_id = $payload->prepared_by_id;
        $inventoryAdjustment->approved_by_id = $payload->approved_by_id;
        $inventoryAdjustment->cancelled_by_id = $payload->cancelled_by_id;
        $inventoryAdjustment->branch_number = $payload->branch_number;
        $inventoryAdjustment->adjustment_date = $payload->adjustment_date;
        $inventoryAdjustment->remarks = $payload->remarks;
        $inventoryAdjustment->is_cancelled = $payload->is_cancelled;
        $inventoryAdjustment->save();

        return $inventoryAdjustment->fresh();
    }

    public function delete(int $id)
    {
        $inventoryAdjustment = InventoryAdjustment::findOrFail($id);
        $inventoryAdjustment->delete();

        return true;
    }
}
