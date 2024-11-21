<?php

namespace App\Interface\Service;

interface CustomerReturnDetailServiceInterface
{
    public function findCustomerReturnDetails();

    public function findCustomerREturnDetailById(int $id);

    public function createCustomerReturnDetail(object $payload);

    public function updateCustomerReturnDetail(object $payload, int $id);

    public function removeCustomerReturnDetail(int $id);
}
