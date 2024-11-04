<?php

namespace App\Interface\Service;

interface UserServiceInterface
{
    //users
    public function findUsers();

    public function getCurrentUser();

    public function findUserById(int $id);

    public function findUserByEmail(string $email);

    public function createUser(object $payload);

    public function updateUser(object $payload, int $id);

    public function deleteUser(int $id);

    //admin

    public function findAdmins();

    public function findAdminById(int $id);

    public function findAdminByEmail(string $email);

    public function createAdmin(object $payload);

    public function updateAdmin(object $payload, int $id);

    public function deleteAdmin(int $id);

    //employee
    public function findEmployees();

    public function findEmployeeById(int $id);

    public function findEmployeeByEmail(string $email);

    public function createEmployee(object $payload);

    public function updateEmployee(object $payload, int $id);

    public function deleteEmployee(int $id);
}
