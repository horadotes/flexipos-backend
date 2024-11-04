<?php

namespace App\Repository;

use App\Interface\Repository\CustomerRepositoryInterface;
use App\Models\Customer;

class CustomerRepository implements CustomerRepositoryInterface
{
    public function findMany()
    {
        return Customer::all();
    }

    public function findOneById(int $id)
    {
        return Customer::findOrFail($id);
    }

    public function create(object $payload)
    {
        $customer = new Customer();
        $customer->firstname = $payload->firstname;
        $customer->lastname = $payload->lastname;
        $customer->email = $payload->email;
        $customer->phone = $payload->phone;
        $customer->address = $payload->address;
        $customer->is_active = $payload->is_active;
        $customer->save();

        return $customer->fresh();
    }

    public function update(object $payload, int $id)
    {
        $customer = Customer::findOrFail($id);
        $customer->firstname = $payload->firstname;
        $customer->lastname = $payload->lastname;
        $customer->email = $payload->email;
        $customer->phone = $payload->phone;
        $customer->address = $payload->address;
        $customer->is_active = $payload->is_active;
        $customer->save();

        return $customer->fresh();
    }

    public function delete(int $id)
    {
        $customer = Customer::findOrFail($id);

        $customer->delete();

        return true;
    }
}
