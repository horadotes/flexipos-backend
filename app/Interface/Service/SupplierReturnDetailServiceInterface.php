<?php

namespace App\Interface\Service;

interface SupplierReturnDetailServiceInterface
{
    public function findSupplierReturnDetails();

    public function findSupplierReturnDetailById(int $id);

    public function createSupplierReturnDetail(object $payload);

    public function updateSupplierReturnDetail(object $payload, int $id);

    public function removeSupplierReturnDetail(int $id);
}
