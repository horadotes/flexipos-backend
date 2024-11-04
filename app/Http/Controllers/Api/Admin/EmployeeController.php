<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Requests\EmployeeStoreRequest;
use App\Http\Requests\EmployeeUpdateRequest;
use App\Interface\Service\EmployeeServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class EmployeeController extends Controller
{
    private $employeeService;

    public function __construct(EmployeeServiceInterface $employeeService)
    {
        $this->employeeService = $employeeService;
    }

    public function index(Request $request)
    {
        return $this->employeeService->findEmployees($request);
    }

    public function store(EmployeeStoreRequest $request)
    {
        return $this->employeeService->createEmployee($request);
    }

    public function show(int $employeeId)
    {
        return $this->employeeService->findEmployeeById($employeeId);
    }

    public function update(EmployeeUpdateRequest $request, int $employeeId)
    {
        return $this->employeeService->updateEmployee($request, $employeeId);
    }

    public function destroy(int $employeeId)
    {
        return $this->employeeService->removeEmployee($employeeId);
    }
}
