<?php

namespace App\Interface\Service;

interface EmployeeServiceInterface
{
    public function findEmployees(object $payload);

    public function findEmployeeById(int $id);

    public function createEmployee(object $payload);

    public function updateEmployee(object $payload, int $id);

    public function removeEmployee(int $id);
}
