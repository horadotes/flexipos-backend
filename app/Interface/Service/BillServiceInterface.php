<?php

namespace App\Interface\Service;

interface BillServiceInterface
{
    public function findBills();

    public function findBillById(int $id);

    public function createBills(object $payload);

    public function updateBills(object $payload, int $id);

    public function removeBills(int $id);
}
