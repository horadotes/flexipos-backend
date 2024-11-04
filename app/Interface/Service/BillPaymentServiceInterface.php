<?php

namespace App\Interface\Service;

interface BillPaymentServiceInterface
{
    public function findBillsPayment();

    public function findBillsPaymentById(int $id);

    public function createBillsPayment(object $payload);

    public function updateBillsPayment(object $payload, int $id);

    public function removeBillsPayment(int $id);
}
