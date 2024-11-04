<?php

namespace App\Repository;

use App\Interface\Repository\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserRepositoryInterface
{
    // Users
    public function findMany()
    {
        return User::all();
    }

    public function findOneById(int $id)
    {
        try {
            return User::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            throw $e;
        }
    }

    public function findOneByEmail(string $email)
    {
        return User::where('email', $email)->first();
    }

    public function create(object $payload)
    {
        try {
            $user = new User();
            $user->role_id = $payload->role_id; // Assuming role is set during creation
            $user->firstname = $payload->firstname;
            $user->lastname = $payload->lastname;
            $user->email = $payload->email;
            $user->password = Hash::make($payload->password);
            $user->save();

            return $user->fresh();
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function update(object $payload, int $id)
    {
        try {
            $user = User::findOrFail($id);
            $user->role_id = $payload->role_id; // Assuming role is set during creation
            $user->firstname = $payload->firstname;
            $user->lastname = $payload->lastname;
            $user->email = $payload->email;
            if (isset($payload->password)) {
                $user->password = Hash::make($payload->password);
            }
            $user->role = $payload->role; // Assuming role can be updated
            $user->save();

            return $user->fresh();
        } catch (ModelNotFoundException $e) {
            throw $e;
        }
    }

    public function delete(int $id)
    {
        try {
            $user = User::findOrFail($id);
            $user->delete();

            return true;
        } catch (ModelNotFoundException $e) {
            throw $e;
        }
    }

    // Admins
    public function findAdmins()
    {
        return User::where('role', 'admin')->get();
    }

    public function findAdminById(int $id)
    {
        try {
            return User::where('role', 'admin')->findOrFail($id);
        } catch (ModelNotFoundException $e) {
            throw $e;
        }
    }

    public function findAdminByEmail(string $email)
    {
        return User::where('role', 'admin')->where('email', $email)->first();
    }

    public function createAdmin(object $payload)
    {
        try {
            $payload->role = 'admin';

            return $this->create($payload);
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function updateAdmin(object $payload, int $id)
    {
        try {
            $payload->role = 'admin';

            return $this->update($payload, $id);
        } catch (ModelNotFoundException $e) {
            throw $e;
        }
    }

    public function deleteAdmin(int $id)
    {
        return $this->delete($id);
    }

    // Employees
    public function findEmployees()
    {
        return User::where('role', 'employee')->get();
    }

    public function findEmployeeById(int $id)
    {
        try {
            return User::where('role', 'employee')->findOrFail($id);
        } catch (ModelNotFoundException $e) {
            throw $e;
        }
    }

    public function findEmployeeByEmail(string $email)
    {
        return User::where('role', 'employee')->where('email', $email)->first();
    }

    public function createEmployee(object $payload)
    {
        try {
            $payload->role = 'employee';

            return $this->create($payload);
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function updateEmployee(object $payload, int $id)
    {
        try {
            $payload->role = 'employee';

            return $this->update($payload, $id);
        } catch (ModelNotFoundException $e) {
            throw $e;
        }
    }

    public function deleteEmployee(int $id)
    {
        return $this->delete($id);
    }
}
