<?php

namespace App\Service;

use App\Http\Resources\CustomerReturnResource;
use App\Interface\Repository\CustomerReturnRepositoryInterface;
use App\Interface\Service\CustomerReturnServiceInterface;

class CustomerReturnService implements CustomerReturnServiceInterface
{
    private $customerReturnRepository;

    public function __construct(CustomerReturnRepositoryInterface $customerReturnRepository)
    {
        $this->customerReturnRepository = $customerReturnRepository;
    }

    public function findCustomerReturns()
    {
        $customerReturns = $this->customerReturnRepository->findMany();

        return CustomerReturnResource::collection($customerReturns);
    }

    public function findCustomerReturnById(int $id)
    {
        $customerReturn = $this->customerReturnRepository->findOneById($id);

        return new CustomerReturnResource($customerReturn);
    }

    public function createCustomerReturn(object $payload)
    {
        $customerReturn = $this->customerReturnRepository->create($payload);

        return new CustomerReturnResource($customerReturn);
    }

    public function updateCustomerReturn(object $payload, int $id)
    {
        $customerReturn = $this->customerReturnRepository->update($payload, $id);

        return new CustomerReturnResource($customerReturn);
    }

    public function removeCustomerReturn(int $id)
    {
        return $this->customerReturnRepository->delete($id);
    }
}
