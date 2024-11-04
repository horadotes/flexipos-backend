<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Requests\SalesInvoiceStoreRequest;
use App\Http\Requests\SalesInvoiceUpdateRequest;
use App\Interface\Service\SalesInvoiceServiceInterface;

class SalesInvoiceController
{
    private $salesInvoiceService;

    public function __construct(SalesInvoiceServiceInterface $salesInvoiceService)
    {
        $this->salesInvoiceService = $salesInvoiceService;
    }

    // Fetch all sales invoices
    public function index()
    {
        return $this->salesInvoiceService->findSalesInvoice();
    }

    // Create a new sales invoice
    public function store(SalesInvoiceStoreRequest $request)
    {
        return $this->salesInvoiceService->createSalesInvoice($request);
    }

    // Fetch a single sales invoice by ID
    public function show(int $salesInvoiceId)
    {
        return $this->salesInvoiceService->findSalesInvoiceById($salesInvoiceId);
    }

    // Update an existing sales invoice
    public function update(SalesInvoiceUpdateRequest $request, int $salesInvoiceId)
    {
        return $this->salesInvoiceService->updateSalesInvoice($request, $salesInvoiceId);
    }

    // Delete a sales invoice by ID
    public function destroy(int $salesInvoiceId)
    {
        return $this->salesInvoiceService->removeSalesInvoice($salesInvoiceId);
    }
}
