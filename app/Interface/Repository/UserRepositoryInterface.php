<?php

namespace App\Interface\Repository;

interface UserRepositoryInterface
{
    // Users
    public function findMany();

    public function findOneById(int $id);

    // public function getRoleByEmail(string $email);

    public function findOneByEmail(string $email);

    public function create(object $payload);

    public function update(object $payload, int $id);

    public function delete(int $id);

    // Admins
    public function findAdmins();

    public function findAdminById(int $id);

    public function findAdminByEmail(string $email);

    public function createAdmin(object $payload);

    public function updateAdmin(object $payload, int $id);

    public function deleteAdmin(int $id);

    // Employees
    public function findEmployees();

    public function findEmployeeById(int $id);

    public function findEmployeeByEmail(string $email);

    public function createEmployee(object $payload);

    public function updateEmployee(object $payload, int $id);

    public function deleteEmployee(int $id);
}
