<?php

namespace App\Service;

use App\Http\Resources\PaymentChequeResource;
use App\Interface\Repository\PaymentChequeRepositoryInterface;
use App\Interface\Service\PaymentChequeServiceInterface;

class PaymentChequeService implements PaymentChequeServiceInterface
{
    private $paymentChequeRepository;

    public function __construct(PaymentChequeRepositoryInterface $paymentChequeRepository)
    {
        $this->paymentChequeRepository = $paymentChequeRepository;
    }

    public function findPaymentCheques()
    {
        $paymentCheques = $this->paymentChequeRepository->findMany();

        return PaymentChequeResource::collection($paymentCheques);
    }

    public function findPaymentChequeById(int $id)
    {
        $paymentCheque = $this->paymentChequeRepository->findOneById($id);

        return new PaymentChequeResource($paymentCheque);
    }

    public function createPaymentCheque(object $payload)
    {
        $paymentCheque = $this->paymentChequeRepository->create($payload);

        return new PaymentChequeResource($paymentCheque);
    }

    public function updatePaymentCheque(object $payload, int $id)
    {
        $paymentCheque = $this->paymentChequeRepository->update($payload, $id);

        return new PaymentChequeResource($paymentCheque);
    }

    public function removePaymentCheque(int $id)
    {
        return $this->paymentChequeRepository->delete($id);
    }
}
