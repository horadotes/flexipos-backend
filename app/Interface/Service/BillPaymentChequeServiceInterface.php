<?php

namespace App\Interface\Service;

interface BillPaymentChequeServiceInterface
{
    public function findBillsPaymentCheques();

    public function findBillsPaymentChequeById(int $id);

    public function createBillsPaymentCheque(object $payload);

    public function updateBillsPaymentCheque(object $payload, int $id);

    public function removeBillsPaymentCheque(int $id);
}
