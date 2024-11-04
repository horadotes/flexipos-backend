<?php

namespace App\Interface\Service;

interface SalesInvoiceDetailServiceInterface
{
    public function findSalesInvoiceDetails();

    public function findSalesInvoiceDetailById(int $id);

    public function createSalesInvoiceDetail(object $payload);

    public function updateSalesInvoiceDetail(object $payload, int $id);

    public function removeSalesInvoiceDetail(int $id);
}
