<?php

namespace App\Service;

use App\Http\Resources\CustomerReturnDetailResource;
use App\Interface\Repository\CustomerReturnDetailRepositoryInterface;
use App\Interface\Service\CustomerReturnDetailServiceInterface;

class CustomerReturnDetailService implements CustomerReturnDetailServiceInterface
{
    private $customerReturnDetailRepository;

    public function __construct(CustomerReturnDetailRepositoryInterface $customerReturnDetailRepository)
    {
        $this->customerReturnDetailRepository = $customerReturnDetailRepository;
    }

    public function findCustomerReturnDetails()
    {
        $customerReturnDetails = $this->customerReturnDetailRepository->findMany();

        return CustomerReturnDetailResource::collection($customerReturnDetails);
    }

    public function findCustomerReturnDetailById(int $id)
    {
        $customerReturnDetail = $this->customerReturnDetailRepository->findOneById($id);

        return new CustomerReturnDetailResource($customerReturnDetail);
    }

    public function createCustomerReturnDetail(object $payload)
    {
        $customerReturnDetail = $this->customerReturnDetailRepository->create($payload);

        return new CustomerReturnDetailResource($customerReturnDetail);
    }

    public function updateCustomerReturnDetail(object $payload, int $id)
    {
        $customerReturnDetail = $this->customerReturnDetailRepository->update($payload, $id);

        return new CustomerReturnDetailResource($customerReturnDetail);
    }

    public function removeCustomerReturnDetail(int $id)
    {
        return $this->customerReturnDetailRepository->delete($id);
    }
}
