<?php

namespace App\Repositories;

use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Order;
use PHPUnit\TextUI\Output\Printer;

class OrderRepository implements OrderRepositoryInterface
{
    public function create(array $data)
    {
        return Order::create($data);
    }
    
    public function all(int $perPage = 10)
    {
        // Fetch prescriptions with published_date not null
        $prescriptions = Order::latest('updated_at')
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
        return Order::findOrFail($id);
    }
}