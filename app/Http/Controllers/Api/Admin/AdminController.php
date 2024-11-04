<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Requests\AdminStoreRequest;
use App\Http\Requests\AdminUpdateRequest;
use App\Interface\Service\UserServiceInterface;
use Illuminate\Http\Request;

class AdminController
{
    private $userService;

    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }

    public function index(Request $request)
    {
        return $this->userService->findAdmins($request);
    }

    public function show(int $id)
    {
        return $this->userService->findAdminById($id);
    }

    public function store(AdminStoreRequest $request)
    {
        return $this->userService->createAdmin($request);
    }

    public function update(AdminUpdateRequest $request, int $id)
    {
        return $this->userService->updateUser($request, $id);
    }

    public function destroy(int $id)
    {
        return $this->userService->deleteUser($id);
    }
}
