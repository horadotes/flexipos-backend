<?php

namespace App\Service;

use App\Http\Resources\SupplierReturnResource;
use App\Interface\Repository\SupplierReturnRepositoryInterface;
use App\Interface\Service\SupplierReturnServiceInterface;

class SupplierReturnService implements SupplierReturnServiceInterface
{
    private $supplierReturnRepository;

    public function __construct(SupplierReturnRepositoryInterface $supplierReturnRepository)
    {
        $this->supplierReturnRepository = $supplierReturnRepository;
    }

    public function findSupplierReturns()
    {
        $supplierReturns = $this->supplierReturnRepository->findMany();

        return SupplierReturnResource::collection($supplierReturns);
    }

    public function findSupplierReturnById(int $id)
    {
        $supplierReturn = $this->supplierReturnRepository->findOneById($id);

        return new SupplierReturnResource($supplierReturn);
    }

    public function createSupplierReturn(object $payload)
    {
        $supplierReturn = $this->supplierReturnRepository->create($payload);

        return new SupplierReturnResource($supplierReturn);
    }

    public function updateSupplierReturn(object $payload, int $id)
    {
        $supplierReturn = $this->supplierReturnRepository->update($payload, $id);

        return new SupplierReturnResource($supplierReturn);
    }

    public function removeSupplierReturn(int $id)
    {
        return $this->supplierReturnRepository->delete($id);
    }
}
