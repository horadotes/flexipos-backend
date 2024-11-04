<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Requests\AuthRequest;
use App\Http\Requests\RegisterRequest;
use App\Interface\Service\AuthServiceInterface;
use App\Interface\Service\UserServiceInterface;
use Illuminate\Http\Request;

class AuthController
{
    private $authService;

    private $userService;

    public function __construct(AuthServiceInterface $authService, UserServiceInterface $userService)
    {
        $this->authService = $authService;
        $this->userService = $userService;
    }

    public function authenticate(AuthRequest $request)
    {
        return $this->authService->adminAuth($request);
    }

    public function unauthenticate(Request $request)
    {
        return $this->authService->logout($request);
    }

    public function findUserByEmail(string $email)
    {
        return $this->userService->FindUserByEmail($email);
    }

    public function getCurrentUser() {}

    // public function register(RegisterRequest $request)
    // {
    //     return $this->authService->registerAccount($request);
    // }
}
