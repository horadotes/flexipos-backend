<?php

namespace App\Service;

use App\Http\Resources\SalesInvoiceDetailResource;
use App\Interface\Repository\SalesInvoiceDetailRepositoryInterface;
use App\Interface\Service\SalesInvoiceDetailServiceInterface;

class SalesInvoiceDetailService implements SalesInvoiceDetailServiceInterface
{
    private $salesInvoiceDetailRepository;

    public function __construct(SalesInvoiceDetailRepositoryInterface $salesInvoiceDetailRepository)
    {
        $this->salesInvoiceDetailRepository = $salesInvoiceDetailRepository;
    }

    public function findSalesInvoiceDetails()
    {
        $salesInvoiceDetails = $this->salesInvoiceDetailRepository->findMany();

        return SalesInvoiceDetailResource::collection($salesInvoiceDetails);
    }

    public function findSalesInvoiceDetailById(int $id)
    {
        $salesInvoiceDetail = $this->salesInvoiceDetailRepository->findOneById($id);

        return new SalesInvoiceDetailResource($salesInvoiceDetail);
    }

    public function createSalesInvoiceDetail(object $payload)
    {
        $salesInvoiceDetail = $this->salesInvoiceDetailRepository->create($payload);

        return new SalesInvoiceDetailResource($salesInvoiceDetail);
    }

    public function updateSalesInvoiceDetail(object $payload, int $id)
    {
        $salesInvoiceDetail = $this->salesInvoiceDetailRepository->update($payload, $id);

        return new SalesInvoiceDetailResource($salesInvoiceDetail);
    }

    public function removeSalesInvoiceDetail(int $id)
    {
        return $this->salesInvoiceDetailRepository->delete($id);
    }
}
