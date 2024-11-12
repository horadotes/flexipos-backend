<?php

namespace App\Interface\Service;

interface PaymentChequeServiceInterface
{
    public function findPaymentCheques();

    public function findPaymentChequeById(int $id);

    public function createPaymentCheque(object $payload);

    public function updatePaymentCheque(object $payload, int $id);

    public function removePaymentCheque(int $id);
}
