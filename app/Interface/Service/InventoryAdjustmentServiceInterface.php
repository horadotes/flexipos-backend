<?php

namespace App\Interface\Service;

interface InventoryAdjustmentServiceInterface
{
    public function findInventoryAdjustments();

    public function findInventoryAdjustmentById(int $id);

    public function createInventoryAdjustment(object $payload);

    public function updateInventoryAdjustment(object $payload, int $id);

    public function removeInventoryAdjustment(int $id);
}
