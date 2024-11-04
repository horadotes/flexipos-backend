<?php

namespace App\Service;

use App\Http\Resources\BillDetailResource;
use App\Interface\Repository\BillDetailRepositoryInterface;
use App\Interface\Service\BillDetailServiceInterface;

class BillDetailService implements BillDetailServiceInterface
{
    private $billDetailRepository;

    public function __construct(BillDetailRepositoryInterface $billDetailRepository)
    {
        $this->billDetailRepository = $billDetailRepository;
    }

    public function findBillDetails()
    {
        $billDetails = $this->billDetailRepository->findMany();

        return BillDetailResource::collection($billDetails);
    }

    public function findBillDetailById(int $id)
    {
        $billDetail = $this->billDetailRepository->findOneById($id);

        return new BillDetailResource($billDetail);
    }

    public function createBillDetails(object $payload)
    {
        $billDetail = $this->billDetailRepository->create($payload);

        return new BillDetailResource($billDetail);
    }

    public function updateBillDetails(object $payload, int $id)
    {
        $billDetail = $this->billDetailRepository->update($payload, $id);

        return new BillDetailResource($billDetail);
    }

    public function removeBillDetails(int $id)
    {
        return $this->billDetailRepository->delete($id);
    }
}
