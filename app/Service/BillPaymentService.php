<?php

namespace App\Service;

use App\Http\Resources\BillPaymentResource;
use App\Interface\Service\BillPaymentServiceInterface;
use App\Repository\BillPaymentRepository;

class BillPaymentService implements BillPaymentServiceInterface
{
    private $billPaymentRepository;

    public function __construct(BillPaymentRepository $billPaymentRepository)
    {
        $this->billPaymentRepository = $billPaymentRepository;
    }

    public function findBillsPayment()
    {
        $billPayments = $this->billPaymentRepository->findMany();

        return BillPaymentResource::collection($billPayments);
    }

    public function findBillsPaymentById(int $id)
    {
        $billPayment = $this->billPaymentRepository->findOneById($id);

        return new BillPaymentResource($billPayment);
    }

    public function createBillsPayment(object $payload)
    {
        $billPayment = $this->billPaymentRepository->create($payload);

        return new BillPaymentResource($billPayment);
    }

    public function updateBillsPayment(object $payload, int $id)
    {
        $billPayment = $this->billPaymentRepository->update($payload, $id);

        return new BillPaymentResource($billPayment);
    }

    public function removeBillsPayment(int $id)
    {
        return $this->billPaymentRepository->delete($id);
    }
}
