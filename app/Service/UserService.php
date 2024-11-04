<?php

namespace App\Service;

use App\Http\Resources\UserResource;
use App\Interface\Repository\UserRepositoryInterface;
use App\Interface\Service\UserServiceInterface;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class UserService implements UserServiceInterface
{
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function findUsers()
    {
        $users = $this->userRepository->findMany();

        return UserResource::collection($users);
    }

    public function getCurrentUser()
    {
        $id = Auth::id();
        $currentUser = User::find($id);

        if (! $currentUser) {
            return response()->json([
                'message' => 'User not found!',
            ], Response::HTTP_BAD_REQUEST);
        }

        $userResource = new UserResource($currentUser);

        return response()->json($userResource);
    }

    public function findUserById(int $id)
    {
        $user = $this->userRepository->findOneById($id);

        return new UserResource($user);
    }

    public function findUserByEmail(string $email)
    {
        $user = $this->userRepository->findOneByEmail($email);

        if (! $user) {
            return response()->json([
                'message' => 'User not found!',
            ], Response::HTTP_BAD_REQUEST);
        }

        return new UserResource($user);
    }

    public function createUser(object $payload)
    {
        $user = $this->userRepository->create($payload);

        return new UserResource($user);
    }

    public function updateUser(object $payload, int $id)
    {
        $user = $this->userRepository->update($payload, $id);

        return new UserResource($user);
    }

    public function deleteUser(int $id)
    {
        return $this->userRepository->delete($id);
    }

    // Admins
    public function findAdmins()
    {
        $admins = $this->userRepository->findAdmins();

        return UserResource::collection($admins);
    }

    public function findAdminById(int $id)
    {
        $admin = $this->userRepository->findAdminById($id);

        return new UserResource($admin);
    }

    public function findAdminByEmail(string $email)
    {
        $admin = $this->userRepository->findAdminByEmail($email);

        return new UserResource($admin);
    }

    public function createAdmin(object $payload)
    {
        $admin = $this->userRepository->createAdmin($payload);

        return new UserResource($admin);
    }

    public function updateAdmin(object $payload, int $id)
    {
        $admin = $this->userRepository->updateAdmin($payload, $id);

        return new UserResource($admin);
    }

    public function deleteAdmin(int $id)
    {
        return $this->userRepository->deleteAdmin($id);
    }

    // Employees
    public function findEmployees()
    {
        $employees = $this->userRepository->findEmployees();

        return UserResource::collection($employees);
    }

    public function findEmployeeById(int $id)
    {
        $employee = $this->userRepository->findEmployeeById($id);

        return new UserResource($employee);
    }

    public function findEmployeeByEmail(string $email)
    {
        $employee = $this->userRepository->findEmployeeByEmail($email);

        return new UserResource($employee);
    }

    public function createEmployee(object $payload)
    {
        $employee = $this->userRepository->createEmployee($payload);

        return new UserResource($employee);
    }

    public function updateEmployee(object $payload, int $id)
    {
        $employee = $this->userRepository->updateEmployee($payload, $id);

        return new UserResource($employee);
    }

    public function deleteEmployee(int $id)
    {
        return $this->userRepository->deleteEmployee($id);
    }
}
