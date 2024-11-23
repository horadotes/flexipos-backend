<?php

namespace App\Service;

use App\Http\Resources\InventoryAdjustmentDetailResource;
use App\Interface\Repository\InventoryAdjustmentDetailRepositoryInterface;
use App\Interface\Service\InventoryAdjustmentDetailServiceInterface;

class InventoryAdjustmentDetailService implements InventoryAdjustmentDetailServiceInterface
{
    private $inventoryAdjustmentDetailRepository;

    public function __construct(InventoryAdjustmentDetailRepositoryInterface $inventoryAdjustmentDetailRepository)
    {
        $this->inventoryAdjustmentDetailRepository = $inventoryAdjustmentDetailRepository;
    }

    public function findInventoryAdjustmentDetails()
    {
        $inventoryAdjustmentDetails = $this->inventoryAdjustmentDetailRepository->findMany();

        return InventoryAdjustmentDetailResource::collection($inventoryAdjustmentDetails);
    }

    public function findInventoryAdjustmentDetailById(int $id)
    {
        $inventoryAdjustmentDetail = $this->inventoryAdjustmentDetailRepository->findOneById($id);

        return new InventoryAdjustmentDetailResource($inventoryAdjustmentDetail);
    }

    public function createInventoryAdjustmentDetail(object $payload)
    {
        $inventoryAdjustmentDetail = $this->inventoryAdjustmentDetailRepository->create($payload);

        return new InventoryAdjustmentDetailResource($inventoryAdjustmentDetail);
    }

    public function updateInventoryAdjustmentDetail(object $payload, int $id)
    {
        $inventoryAdjustmentDetail = $this->inventoryAdjustmentDetailRepository->update($payload, $id);

        return new InventoryAdjustmentDetailResource($inventoryAdjustmentDetail);
    }

    public function removeInventoryAdjustmentDetail(int $id)
    {
        return $this->inventoryAdjustmentDetailRepository->delete($id);
    }
}
