<?php

namespace App\Service;

use App\Http\Resources\PaymentDetailResource;
use App\Interface\Repository\PaymentDetailRepositoryInterface;
use App\Interface\Service\PaymentDetailServiceInterface;

class PaymentDetailService implements PaymentDetailServiceInterface
{
    private $paymentDetailRepository;

    public function __construct(PaymentDetailRepositoryInterface $paymentDetailRepository)
    {
        $this->paymentDetailRepository = $paymentDetailRepository;
    }

    public function findPaymentDetails()
    {
        $paymentDetails = $this->paymentDetailRepository->findMany();

        return PaymentDetailResource::collection($paymentDetails);
    }

    public function findPaymentDetailById(int $id)
    {
        $paymentDetail = $this->paymentDetailRepository->findOneById($id);

        return new PaymentDetailResource($paymentDetail);
    }

    public function createPaymentDetail(object $payload)
    {
        $paymentDetail = $this->paymentDetailRepository->create($payload);

        return new PaymentDetailResource($paymentDetail);
    }

    public function updatePaymentDetail(object $payload, int $id)
    {
        $paymentDetail = $this->paymentDetailRepository->update($payload, $id);

        return new PaymentDetailResource($paymentDetail);
    }

    public function removePaymentDetail(int $id)
    {
        return $this->paymentDetailRepository->delete($id);
    }
}
