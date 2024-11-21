<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Requests\CustomerReturnStoreRequest;
use App\Http\Requests\CustomerReturnUpdateRequest;
use App\Interface\Service\CustomerReturnServiceInterface;
use Illuminate\Routing\Controller;

class CustomerReturnController extends Controller
{
    private $customerReturnService;

    public function __construct(CustomerReturnServiceInterface $customerReturnService)
    {
        $this->customerReturnService = $customerReturnService;
    }

    public function index()
    {
        return $this->customerReturnService->findCustomerReturns();
    }

    public function show(int $id)
    {
        return $this->customerReturnService->findCustomerReturnById($id);
    }

    public function store(CustomerReturnStoreRequest $request)
    {
        return $this->customerReturnService->createCustomerReturn($request);
    }

    public function update(CustomerReturnUpdateRequest $request, int $id)
    {
        return $this->customerReturnService->updateCustomerReturn($request, $id);
    }

    public function destroy(int $id)
    {
        return $this->customerReturnService->removeCustomerReturn($id);
    }
}
