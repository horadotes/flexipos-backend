<?php

namespace App\Interface\Service;

interface PaymentInvoiceServiceInterface
{
    public function findPaymentInvoice();

    public function findPaymentInvoiceById(int $id);

    public function createPaymentInvoice(object $payload);

    public function updatePaymentInvoice(object $payload, int $id);

    public function removePaymentInvoice(int $id);
}
