<?php

namespace App\Interface\Service;

interface PaymentServiceInterface
{
    public function findPayments();

    public function findPaymentById(int $id);

    public function createPayment(object $payload);

    public function updatePayment(object $payload, int $id);

    public function removePayment(int $id);
}
