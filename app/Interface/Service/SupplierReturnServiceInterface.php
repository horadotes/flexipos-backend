<?php

namespace App\Interface\Service;

interface SupplierReturnServiceInterface
{
    public function findSupplierReturns();

    public function findSupplierReturnById(int $id);

    public function createSupplierReturn(object $payload);

    public function updateSupplierReturn(object $payload, int $id);

    public function removeSupplierReturn(int $id);
}
