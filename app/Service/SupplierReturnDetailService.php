<?php

namespace App\Service;

use App\Http\Resources\SupplierReturnDetailResource;
use App\Interface\Repository\SupplierReturnDetailRepositoryInterface;
use App\Interface\Service\SupplierReturnDetailServiceInterface;

class SupplierReturnDetailService implements SupplierReturnDetailServiceInterface
{
    private $supplierReturnDetailRepository;

    public function __construct(SupplierReturnDetailRepositoryInterface $supplierReturnDetailRepository)
    {
        $this->supplierReturnDetailRepository = $supplierReturnDetailRepository;
    }

    public function findSupplierReturnDetails()
    {
        $supplierReturnDetails = $this->supplierReturnDetailRepository->findMany();

        return SupplierReturnDetailResource::collection($supplierReturnDetails);
    }

    public function findSupplierReturnDetailById(int $id)
    {
        $supplierReturnDetail = $this->supplierReturnDetailRepository->findOneById($id);

        return new SupplierReturnDetailResource($supplierReturnDetail);
    }

    public function createSupplierReturnDetail(object $payload)
    {
        $supplierReturnDetail = $this->supplierReturnDetailRepository->create($payload);

        return new SupplierReturnDetailResource($supplierReturnDetail);
    }

    public function updateSupplierReturnDetail(object $payload, int $id)
    {
        $supplierReturnDetail = $this->supplierReturnDetailRepository->update($payload, $id);

        return new SupplierReturnDetailResource($supplierReturnDetail);
    }

    public function removeSupplierReturnDetail(int $id)
    {
        return $this->supplierReturnDetailRepository->delete($id);
    }
}
