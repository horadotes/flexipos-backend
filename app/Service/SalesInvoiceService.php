<?php

namespace App\Service;

use App\Http\Resources\SalesInvoiceResource;
use App\Interface\Repository\SalesInvoiceRepositoryInterface;
use App\Interface\Service\SalesInvoiceServiceInterface;

class SalesInvoiceService implements SalesInvoiceServiceInterface
{
    private $salesInvoiceRepository;

    public function __construct(SalesInvoiceRepositoryInterface $salesInvoiceRepository)
    {
        $this->salesInvoiceRepository = $salesInvoiceRepository;
    }

    public function findSalesInvoice()
    {
        $salesInvoices = $this->salesInvoiceRepository->findMany();

        return SalesInvoiceResource::collection($salesInvoices);
    }

    public function findSalesInvoiceById(int $id)
    {
        $salesInvoice = $this->salesInvoiceRepository->findOneById($id);

        return new SalesInvoiceResource($salesInvoice);
    }

    public function CreateSalesInvoice(object $payload)
    {
        $salesInvoice = $this->salesInvoiceRepository->create($payload);

        return new SalesInvoiceResource($salesInvoice);
    }

    public function updateSalesInvoice(object $payload, int $id)
    {
        $salesInvoice = $this->salesInvoiceRepository->update($payload, $id);

        return new SalesInvoiceResource($salesInvoice);
    }

    public function removeSalesInvoice(int $id)
    {
        return $this->salesInvoiceRepository->delete($id);
    }
}
