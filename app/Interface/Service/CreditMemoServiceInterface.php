<?php

namespace App\Interface\Service;

interface CreditMemoServiceInterface
{
    public function findCreditMemos();

    public function findCreditMemoById(int $id);

    public function createCreditMemo(object $payload);

    public function updateCreditMemo(object $payload, int $id);

    public function removeCreditMemo(int $id);
}
