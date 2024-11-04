<?php

namespace App\Service;

use App\Http\Resources\SupplierResource;
use App\Interface\Repository\SupplierRepositoryInterface;
use App\Interface\Service\SupplierServiceInterface;

class SupplierService implements SupplierServiceInterface
{
    private $supplierRepository;

    public function __construct(SupplierRepositoryInterface $supplierRepository)
    {
        $this->supplierRepository = $supplierRepository;
    }

    public function findSuppliers()
    {
        $suppliers = $this->supplierRepository->findMany();

        return SupplierResource::collection($suppliers);
    }

    public function findSupplierById(int $id)
    {
        $supplier = $this->supplierRepository->findOneById($id);

        return new SupplierResource($supplier);
    }

    public function createSupplier(object $payload)
    {
        $supplier = $this->supplierRepository->create($payload);

        return new SupplierResource($supplier);
    }

    public function updateSupplier(object $payload, int $id)
    {
        $supplier = $this->supplierRepository->update($payload, $id);

        return new SupplierResource($supplier);
    }

    public function removeSupplier(int $id)
    {
        return $this->supplierRepository->delete($id);
    }
}
