<?php

namespace App\Service;

use App\Http\Resources\BillpaymentChequeResource;
use App\Interface\Service\BillPaymentChequeServiceInterface;
use App\Repository\BillPaymentChequeRepository;

class BillPaymentChequeService implements BillPaymentChequeServiceInterface
{
    private $billPaymentChequeRepository;

    public function __construct(BillPaymentChequeRepository $billPaymentChequeRepository)
    {
        $this->billPaymentChequeRepository = $billPaymentChequeRepository;
    }

    public function findBillsPaymentCheques()
    {
        $billPaymentCheques = $this->billPaymentChequeRepository->findMany();

        return BillpaymentChequeResource::collection($billPaymentCheques);
    }

    public function findBillsPaymentChequeById(int $id)
    {
        $billPaymentCheque = $this->billPaymentChequeRepository->findOneById($id);

        return new BillPaymentChequeResource($billPaymentCheque);
    }

    public function createBillsPaymentCheque(object $payload)
    {
        $billPaymentCheque = $this->billPaymentChequeRepository->create($payload);

        return new BillPaymentChequeResource($billPaymentCheque);
    }

    public function updateBillsPaymentCheque(object $payload, int $id)
    {
        $billPaymentCheque = $this->billPaymentChequeRepository->update($payload, $id);

        return new BillPaymentChequeResource($billPaymentCheque);
    }

    public function removeBillsPaymentCheque(int $id)
    {
        return $this->billPaymentChequeRepository->delete($id);
    }
}
