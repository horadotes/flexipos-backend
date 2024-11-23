<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Requests\CreditMemoStoreRequest;
use App\Http\Requests\CreditMemoUpdateRequest;
use App\Interface\Service\CreditMemoServiceInterface;
use Illuminate\Routing\Controller;

class CreditMemoController extends Controller
{
    private $creditMemoService;

    public function __construct(CreditMemoServiceInterface $creditMemoService)
    {
        $this->creditMemoService = $creditMemoService;
    }

    public function index()
    {
        return $this->creditMemoService->findCreditMemos();
    }

    public function show(int $id)
    {
        return $this->creditMemoService->findCreditMemoById($id);
    }

    public function store(CreditMemoStoreRequest $request)
    {
        return $this->creditMemoService->createCreditMemo($request);
    }

    public function update(CreditMemoUpdateRequest $request, int $id)
    {
        return $this->creditMemoService->updateCreditMemo($request, $id);
    }

    public function destroy(int $id)
    {
        return $this->creditMemoService->removeCreditMemo($id);
    }
}
