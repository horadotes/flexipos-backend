<?php

namespace App\Interface\Repository;

interface EmployeeRepositoryInterface
{
    public function findMany(object $payload, string $sortField, string $sortOrder);

    public function findOneById(int $id);

    public function findOneByEmail(string $email);

    public function create(object $payload);

    public function update(object $payload, int $id);

    public function delete(int $id);
}
