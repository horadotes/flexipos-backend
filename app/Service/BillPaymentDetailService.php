<?php

namespace App\Service;

use App\Http\Resources\BillPaymentDetailResource;
use App\Interface\Service\BillPaymentDetailServiceInterface;
use App\Repository\BillPaymentDetailRepository;

class BillPaymentDetailService implements BillPaymentDetailServiceInterface
{
    private $billPaymentDetailRepository;

    public function __construct(BillPaymentDetailRepository $billPaymentDetailRepository)
    {
        $this->billPaymentDetailRepository = $billPaymentDetailRepository;
    }

    public function findBillsPaymentDetails()
    {
        $billPaymentDetails = $this->billPaymentDetailRepository->findMany();

        return BillPaymentDetailResource::collection($billPaymentDetails);
    }

    public function findBillsPaymentDetailById(int $id)
    {
        $billPaymentDetail = $this->billPaymentDetailRepository->findOneById($id);

        return new BillPaymentDetailResource($billPaymentDetail);
    }

    public function createBillsPaymentDetail(object $payload)
    {
        $billPaymentDetail = $this->billPaymentDetailRepository->create($payload);

        return new BillPaymentDetailResource($billPaymentDetail);
    }

    public function updateBillsPaymentDetail(object $payload, int $id)
    {
        $billPaymentDetail = $this->billPaymentDetailRepository->update($payload, $id);

        return new BillPaymentDetailResource($billPaymentDetail);
    }

    public function removeBillsPaymentDetail(int $id)
    {
        return $this->billPaymentDetailRepository->delete($id);
    }
}
