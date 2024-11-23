<?php

namespace App\Service;

use App\Http\Resources\CreditMemoResource;
use App\Interface\Repository\CreditMemoRepositoryInterface;
use App\Interface\Service\CreditMemoServiceInterface;

class CreditMemoService implements CreditMemoServiceInterface
{
    private $creditMemoRepository;

    public function __construct(CreditMemoRepositoryInterface $creditMemoRepository)
    {
        $this->creditMemoRepository = $creditMemoRepository;
    }

    public function findCreditMemos()
    {
        $creditMemos = $this->creditMemoRepository->findMany();

        return CreditMemoResource::collection($creditMemos);
    }

    public function findCreditMemoById(int $id)
    {
        $creditMemo = $this->creditMemoRepository->findOneById($id);

        return new CreditMemoResource($creditMemo);
    }

    public function createCreditMemo(object $payload)
    {
        $creditMemo = $this->creditMemoRepository->create($payload);

        return new CreditMemoResource($creditMemo);
    }

    public function updateCreditMemo(object $payload, int $id)
    {
        $creditMemo = $this->creditMemoRepository->update($payload, $id);

        return new CreditMemoResource($creditMemo);
    }

    public function removeCreditMemo(int $id)
    {
        return $this->creditMemoRepository->delete($id);
    }
}
