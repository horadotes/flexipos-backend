<?php

namespace App\Service;

use App\Http\Resources\PaymentInvoiceResource;
use App\Interface\Repository\PaymentInvoiceRepositoryInterface;
use App\Interface\Service\PaymentInvoiceServiceInterface;

class PaymentInvoiceService implements PaymentInvoiceServiceInterface
{
    private $paymentInvoiceRepository;

    public function __construct(PaymentInvoiceRepositoryInterface $paymentInvoiceRepository)
    {
        $this->paymentInvoiceRepository = $paymentInvoiceRepository;
    }

    public function findPaymentInvoice()
    {
        $paymentInvoices = $this->paymentInvoiceRepository->findMany();

        return PaymentInvoiceResource::collection($paymentInvoices);
    }

    public function findPaymentInvoiceById(int $id)
    {
        $paymentInvoice = $this->paymentInvoiceRepository->findOneById($id);

        return new PaymentInvoiceResource($paymentInvoice);
    }

    public function createPaymentInvoice(object $payload)
    {
        $paymentInvoice = $this->paymentInvoiceRepository->create($payload);

        return new PaymentInvoiceResource($paymentInvoice);
    }

    public function updatePaymentInvoice(object $payload, int $id)
    {
        $paymentInvoice = $this->paymentInvoiceRepository->update($payload, $id);

        return new PaymentInvoiceResource($paymentInvoice);
    }

    public function removePaymentInvoice(int $id)
    {
        return $this->paymentInvoiceRepository->delete($id);
    }
}
