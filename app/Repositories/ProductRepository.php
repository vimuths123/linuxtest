<?php

namespace App\Repositories;

use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Product;
use PHPUnit\TextUI\Output\Printer;

class ProductRepository implements ProductRepositoryInterface
{
    public function create(array $data)
    {
        return Product::create($data);
    }
    
    public function all(int $perPage = 10)
    {
        // Fetch prescriptions with published_date not null
        $prescriptions = Product::latest('updated_at')
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
        return Product::findOrFail($id);
    }

    public function update($id, array $data)
    {
        $product = Product::findOrFail($id);
        $product->update($data);

        return $product;
    }
}