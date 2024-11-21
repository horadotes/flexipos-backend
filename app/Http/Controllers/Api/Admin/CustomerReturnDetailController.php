<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Requests\CustomerReturnDetailStoreRequest;
use App\Http\Requests\CustomerReturnDetailUpdateRequest;
use App\Interface\Service\CustomerReturnDetailServiceInterface;
use Illuminate\Routing\Controller;

class CustomerReturnDetailController extends Controller
{
    private $customerReturnDetailService;

    public function __construct(CustomerReturnDetailServiceInterface $customerReturnDetailService)
    {
        $this->customerReturnDetailService = $customerReturnDetailService;
    }

    public function index()
    {
        return $this->customerReturnDetailService->findCustomerReturnDetails();
    }

    public function show(int $id)
    {
        return $this->customerReturnDetailService->findCustomerReturnDetailById($id);
    }

    public function store(CustomerReturnDetailStoreRequest $request)
    {
        return $this->customerReturnDetailService->createCustomerReturnDetail($request);
    }

    public function update(CustomerReturnDetailUpdateRequest $request, int $id)
    {
        return $this->customerReturnDetailService->updateCustomerReturnDetail($request, $id);
    }

    public function destroy(int $id)
    {
        return $this->customerReturnDetailService->removeCustomerReturnDetail($id);
    }
}
