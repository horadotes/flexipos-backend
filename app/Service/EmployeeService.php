<?php

namespace App\Service;

use App\Http\Resources\EmployeeResource;
use App\Interface\Repository\EmployeeRepositoryInterface;
use App\Interface\Service\EmployeeServiceInterface;
use App\Traits\SortingTraits;

class EmployeeService implements EmployeeServiceInterface
{
    use SortingTraits;

    private $employeeRepository;

    public function __construct(EmployeeRepositoryInterface $employeeRepository)
    {
        $this->employeeRepository = $employeeRepository;
    }

    public function findEmployees(object $payload)
    {
        $sortField = $this->sortField($payload, 'created_at');
        $sortOrder = $this->sortOrder($payload, 'desc');
        $employees = $this->employeeRepository->findMany($payload, $sortField, $sortOrder);

        return EmployeeResource::collection($employees);
    }

    public function findEmployeeById(int $id)
    {
        $employee = $this->employeeRepository->findOneById($id);

        return new EmployeeResource($employee);
    }

    public function createEmployee(object $payload)
    {
        $employee = $this->employeeRepository->create($payload);

        return new EmployeeResource($employee);
    }

    public function updateEmployee(object $payload, int $id)
    {
        $employee = $this->employeeRepository->update($payload, $id);

        return new EmployeeResource($employee);
    }

    public function removeEmployee(int $id)
    {
        return $this->employeeRepository->delete($id);
    }
}
