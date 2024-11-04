<?php

namespace App\Http\Controllers;

use App\Interface\Service\UserServiceInterface;
use Illuminate\Http\Request;

class UserController
{
    private $userService;

    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        return $this->userService->findUsers();
    }

    public function getCurrentUser()
    {
        return $this->userService->getCurrentUser();
    }

    public function show(int $id)
    {
        return $this->userService->findUserById($id);
    }

    public function showUserByEmail(string $email)
    {
        return $this->userService->FindUserByEmail($email);
    }

    public function store(Request $request)
    {
        return $this->userService->createUser($request);
    }

    public function update(Request $request, int $id)
    {
        return $this->userService->updateUser($request, $id);
    }

    public function destroy(int $id)
    {
        return $this->userService->deleteUser($id);
    }
}
