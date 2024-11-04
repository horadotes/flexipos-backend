<?php

namespace App\Interface\Service;

interface CustomerServiceInterface
{
    public function findCustomers();

    public function findCustomerById(int $id);

    public function createCustomer(object $payload);

    public function updateCustomer(object $payload, int $id);

    public function removeCustomer(int $id);
}
