<?php

namespace App\Interface\Service;

interface CustomerReturnServiceInterface
{
    public function findCustomerReturns();

    public function findCustomerReturnById(int $id);

    public function createCustomerReturn(object $payload);

    public function updateCustomerReturn(object $payload, int $id);

    public function removeCustomerReturn(int $id);
}
