<?php

namespace App\Repositories;

use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Customer;
use PHPUnit\TextUI\Output\Printer;

class CustomerRepository implements CustomerRepositoryInterface
{
    public function create(array $data)
    {
        return Customer::create($data);
    }
    
    public function all(int $perPage = 10)
    {
        // Fetch prescriptions with published_date not null
        $prescriptions = Customer::latest('updated_at')
            ->paginate($perPage);

        // Transform the result to a LengthAwarePaginator instance
        return new LengthAwarePaginator(
            $prescriptions->items(),
            $prescriptions->total(),
            $prescriptions->perPage(),
            $prescriptions->currentPage(),
            ['path' => LengthAwarePaginator::resolveCurrentPath()]
        );
    }

    public function find($id)
    {
        return Customer::findOrFail($id);
    }

    public function update($id, array $data)
    {
        $customer = Customer::findOrFail($id);
        $customer->update($data);

        return $customer;
    }
}