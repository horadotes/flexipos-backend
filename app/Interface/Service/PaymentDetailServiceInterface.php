<?php

namespace App\Interface\Service;

interface PaymentDetailServiceInterface
{
    public function findPaymentDetails();

    public function findPaymentDetailById(int $id);

    public function createPaymentDetail(object $payload);

    public function updatePaymentDetail(object $payload, int $id);

    public function removePaymentDetail(int $id);
}
