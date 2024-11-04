<?php

namespace App\Interface\Service;

interface StripeServiceInterface
{
    public function createPayment(object $payload);

    public function verifyPayment(object $payload);
}
