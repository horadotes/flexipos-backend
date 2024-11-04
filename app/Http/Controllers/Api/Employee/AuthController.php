<?php

namespace App\Http\Controllers\Api\Employee;

use App\Http\Requests\AuthRequest;
use App\Interface\Service\AuthServiceInterface;
use GuzzleHttp\Psr7\Request;

class AuthController
{
    private $authService;

    public function __construct(AuthServiceInterface $authService)
    {
        $this->authService = $authService;
    }

    public function authenticate(AuthRequest $request)
    {
        return $this->authService->employeeAuth($request);
    }

    public function unauthenticate(Request $request)
    {
        return $this->authService->logout($request);
    }
}
