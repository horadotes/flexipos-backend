<?php

namespace App\Repository;

use App\Interface\Repository\EmployeeRepositoryInterface;
use App\Models\Employee;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class EmployeeRepository implements EmployeeRepositoryInterface
{
    public function findMany(object $payload, string $sortField, string $sortOrder)
    {
        return Employee::all();
    }

    public function findOneById(int $id)
    {
        return Employee::findOrFail($id);
    }

    public function findOneByEmail(string $email)
    {
        return Employee::where('email', $email)->first();
    }

    public function create(object $payload)
    {
        try {
            $employee = new Employee();
            $employee->firstname = $payload->firstname;
            $employee->lastname = $payload->lastname;
            $employee->email = $payload->email;
            $employee->phone = $payload->phone;
            $employee->designation = $payload->designation;
            $employee->is_active = $payload->is_active;
            $employee->save();

            return $employee->fresh();
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function update(object $payload, int $id)
    {
        try {
            $employee = Employee::findOrFail($id);
            $employee->firstname = $payload->firstname;
            $employee->lastname = $payload->lastname;
            $employee->email = $payload->email;
            $employee->phone = $payload->phone;
            $employee->designation = $payload->designation;
            $employee->is_active = $payload->is_active;
            $employee->save();

            return $employee->fresh();
        } catch (ModelNotFoundException $e) {
            throw $e;
        }
    }

    public function delete(int $id)
    {
        try {
            $employee = Employee::findOrFail($id);
            $employee->delete();

            return true;
        } catch (ModelNotFoundException $e) {
            throw $e;
        }
    }
}
