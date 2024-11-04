<?php

namespace App\Service;

use App\Http\Resources\CustomerResource;
use App\Interface\Repository\CustomerRepositoryInterface;
use App\Interface\Service\CustomerServiceInterface;

class CustomerService implements CustomerServiceInterface
{
    private $customerRepository;

    public function __construct(CustomerRepositoryInterface $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    public function findCustomers()
    {
        $customers = $this->customerRepository->findMany();

        return CustomerResource::collection($customers);
    }

    public function findCustomerById(int $id)
    {
        $customer = $this->customerRepository->findOneById($id);

        return new CustomerResource($customer);
    }

    public function createCustomer(object $payload)
    {
        $customer = $this->customerRepository->create($payload);

        return new CustomerResource($customer);
    }

    public function updateCustomer(object $payload, int $id)
    {
        $customer = $this->customerRepository->update($payload, $id);

        return new CustomerResource($customer);
    }

    public function removeCustomer(int $id)
    {
        return $this->customerRepository->delete($id);
    }
}
