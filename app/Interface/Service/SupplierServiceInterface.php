<?php

namespace App\Interface\Service;

interface SupplierServiceInterface
{
    public function findSuppliers();

    public function findSupplierById(int $id);

    public function createSupplier(object $payload);

    public function updateSupplier(object $payload, int $id);

    public function removeSupplier(int $id);
}
