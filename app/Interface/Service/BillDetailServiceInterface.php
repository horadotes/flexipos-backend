<?php

namespace App\Interface\Service;

interface BillDetailServiceInterface
{
    public function findBillDetails();

    public function findBillDetailById(int $id);

    public function createBillDetails(object $payload);

    public function updateBillDetails(object $payload, int $id);

    public function removeBillDetails(int $id);
}
