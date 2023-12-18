<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Repositories\CustomerRepositoryInterface;
use App\Repositories\ProductRepositoryInterface;
use App\Repositories\OrderRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;


class OrderController extends Controller
{

    protected $customerRepository;
    protected $productRepository;
    protected $orderRepository;

    public function __construct(
        CustomerRepositoryInterface $customerRepository,
        ProductRepositoryInterface $productRepository,
        OrderRepositoryInterface $orderRepository
    ) {
        $this->customerRepository = $customerRepository;
        $this->productRepository = $productRepository;
        $this->orderRepository = $orderRepository;
    }

    public function index()
    {
        $perPage = 10;
        $orders = $this->orderRepository->all($perPage);

        return view('orders.list', compact('orders'));
    }

    public function placeOrder()
    {
        $perPage = 99999999;
        $customers = $this->customerRepository->all($perPage);
        $products = $this->productRepository->all($perPage);
        $order_number = Str::uuid()->toString();

        return view('orders.place', compact('customers', 'order_number', 'products'));
    }

    public function storePlacedOrder(Request $request)
    {

        if ($request->has('product_id')) {
            // dd($request->all());
            $productIds = $request->input('product_id');
            $quantities = $request->input('quantity');
            $freeQuantities = $request->input('free');
            $reductions = $request->input('reduction');

            $amount = 0;

            foreach ($productIds as $index => $productId) {
                $amount += $reductions[$index];
            }

            $order = $this->orderRepository->create([
                'customer_id' => $request->input('customer_id'),
                'order_number' => $request->input('order_number'),
                'order_date' => Carbon::now()->toDateString(),
                'order_time' => Carbon::now()->toTimeString(),
                'net_amount' => $amount,
            ]);

            foreach ($productIds as $index => $productId) {
                $quantity = $quantities[$index];
                $freequantity = $freeQuantities[$index];
                $amount = $reductions[$index];

                $order->products()->attach($productId, [
                    'quantity' => $quantity,
                    'free_quantity' => $freequantity,
                    'amount' => $amount,
                ]);
            }
        }
    }

    public function show($id)
    {
        $order = $this->orderRepository->find($id);


        return view('orders.show', compact('order'));
    }
}
