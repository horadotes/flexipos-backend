<?php

namespace App\Service;

use App\Http\Resources\PaymentResource;
use App\Interface\Repository\PaymentRepositoryInterface;
use App\Interface\Service\PaymentServiceInterface;

class PaymentService implements PaymentServiceInterface
{
    private $paymentRepository;

    public function __construct(PaymentRepositoryInterface $paymentRepository)
    {
        $this->paymentRepository = $paymentRepository;
    }

    public function findPayments()
    {
        $payments = $this->paymentRepository->findMany();

        return PaymentResource::collection($payments);
    }

    public function findPaymentById(int $id)
    {
        $payment = $this->paymentRepository->findOneById($id);

        return new PaymentResource($payment);
    }

    public function createPayment(object $payload)
    {
        $payment = $this->paymentRepository->create($payload);

        return new PaymentResource($payment);
    }

    public function updatePayment(object $payload, int $id)
    {
        $payment = $this->paymentRepository->update($payload, $id);

        return new PaymentResource($payment);
    }

    public function removePayment(int $id)
    {
        return $this->paymentRepository->delete($id);
    }
}
