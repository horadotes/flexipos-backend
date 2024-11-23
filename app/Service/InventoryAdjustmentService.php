<?php

namespace App\Service;

use App\Http\Resources\InventoryAdjustmentResource;
use App\Interface\Repository\InventoryAdjustmentRepositoryInterface;
use App\Interface\Service\InventoryAdjustmentServiceInterface;

class InventoryAdjustmentService implements InventoryAdjustmentServiceInterface
{
    private $inventoryAdjustmentRepository;

    public function __construct(InventoryAdjustmentRepositoryInterface $inventoryAdjustmentRepository)
    {
        $this->inventoryAdjustmentRepository = $inventoryAdjustmentRepository;
    }

    public function findInventoryAdjustments()
    {
        $inventoryAdjustments = $this->inventoryAdjustmentRepository->findMany();

        return InventoryAdjustmentResource::collection($inventoryAdjustments);
    }

    public function findInventoryAdjustmentById(int $id)
    {
        $inventoryAdjustment = $this->inventoryAdjustmentRepository->findOneById($id);

        return new InventoryAdjustmentResource($inventoryAdjustment);
    }

    public function createInventoryAdjustment(object $payload)
    {
        $inventoryAdjustment = $this->inventoryAdjustmentRepository->create($payload);

        return new InventoryAdjustmentResource($inventoryAdjustment);
    }

    public function updateInventoryAdjustment(object $payload, int $id)
    {
        $inventoryAdjustment = $this->inventoryAdjustmentRepository->update($payload, $id);

        return new InventoryAdjustmentResource($inventoryAdjustment);
    }

    public function removeInventoryAdjustment(int $id)
    {
        return $this->inventoryAdjustmentRepository->delete($id);
    }
}
