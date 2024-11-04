<?php

namespace App\Interface\Service;

interface AuthServiceInterface
{
    // public function registerAccount(object $payload);

    public function adminAuth(object $payload);

    public function employeeAuth(object $payload);

    public function logout(object $payload);
}
