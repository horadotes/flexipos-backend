<?php

namespace App\Service;

use App\Http\Resources\AuthResource;
use App\Http\Resources\EmployeeResource;
use App\Http\Resources\UserResource;
use App\Interface\Repository\EmployeeRepositoryInterface;
use App\Interface\Repository\UserRepositoryInterface;
use App\Interface\Service\AuthServiceInterface;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class AuthService implements AuthServiceInterface
{
    private $userRepository;

    private $employeeRepository;

    public function __construct(
        UserRepositoryInterface $userRepository,
        EmployeeRepositoryInterface $employeeRepository
    ) {
        $this->userRepository = $userRepository;
        $this->employeeRepository = $employeeRepository;
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

    public function adminAuth(object $payload)
    {
        $user = $this->userRepository->findOneByEmail($payload->email);

        if (! $user) {
            return response()->json([
                'message' => 'User not found!',
            ], Response::HTTP_BAD_REQUEST);
        }

        if (! Hash::check($payload->password, $user->password)) {
            return response()->json([
                'message' => 'Invalid Credentials!',
            ], Response::HTTP_UNAUTHORIZED);
        }

        $data = (object) [
            'token' => $user->createToken('auth-token')->plainTextToken,
            'user' => new UserResource($user),
        ];

        return new AuthResource($data);
    }

    public function employeeAuth(object $payload)
    {
        $employee = $this->employeeRepository->findOneByEmail($payload->email);

        if (! $employee) {
            return response()->json([
                'message' => 'User not found!',
            ], Response::HTTP_BAD_REQUEST);
        }

        if (! Hash::check($payload->password, $employee->password)) {
            return response()->json([
                'message' => 'Invalid Credentials!',
            ], Response::HTTP_UNAUTHORIZED);
        }

        $data = (object) [
            'token' => $employee->createToken('auth-token')->plainTextToken,
            'user' => new EmployeeResource($employee),
        ];

        return new AuthResource($data);
    }

    public function logout(object $payload)
    {
        $payload->user()->tokens()->delete();

        return response()->json([
            'message' => 'Successfully Logged out',
        ], Response::HTTP_OK);
    }
}
