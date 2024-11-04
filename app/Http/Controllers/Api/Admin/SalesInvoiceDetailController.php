<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Requests\SalesInvoiceDetailStoreRequest;
use App\Http\Requests\SalesInvoiceDetailUpdateRequest;
use App\Interface\Service\SalesInvoiceDetailServiceInterface;

class SalesInvoiceDetailController
{
    private $salesInvoiceDetailService;

    public function __construct(SalesInvoiceDetailServiceInterface $salesInvoiceDetailService)
    {
        $this->salesInvoiceDetailService = $salesInvoiceDetailService;
    }

    // Fetch all sales invoice details
    public function index()
    {
        return $this->salesInvoiceDetailService->findSalesInvoiceDetails();
    }

    // Create a new sales invoice detail
    public function store(SalesInvoiceDetailStoreRequest $request)
    {
        return $this->salesInvoiceDetailService->createSalesInvoiceDetail($request);
    }

    // Fetch a single sales invoice detail by ID
    public function show(int $salesInvoiceDetailId)
    {
        return $this->salesInvoiceDetailService->findSalesInvoiceDetailById($salesInvoiceDetailId);
    }

    // Update an existing sales invoice detail
    public function update(SalesInvoiceDetailUpdateRequest $request, int $salesInvoiceDetailId)
    {
        return $this->salesInvoiceDetailService->updateSalesInvoiceDetail($request, $salesInvoiceDetailId);
    }

    // Delete a sales invoice detail by ID
    public function destroy(int $salesInvoiceDetailId)
    {
        return $this->salesInvoiceDetailService->removeSalesInvoiceDetail($salesInvoiceDetailId);
    }
}
