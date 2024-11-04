<?php

namespace App\Interface\Service;

interface BillPaymentDetailServiceInterface
{
    public function findBillsPaymentDetails();

    public function findBillsPaymentDetailById(int $id);

    public function createBillsPaymentDetail(object $payload);

    public function updateBillsPaymentDetail(object $payload, int $id);

    public function removeBillsPaymentDetail(int $id);
}
