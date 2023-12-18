<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Requests\CustomerStoreRequest;
use App\Http\Requests\CustomerUpdateRequest;
use App\Repositories\CustomerRepositoryInterface;

class CustomerController extends Controller
{

    protected $customerRepository;

    public function __construct(CustomerRepositoryInterface $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $perPage = 10;
        $customers = $this->customerRepository->all($perPage);

        

        return view('customers.list', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CustomerStoreRequest $request)
    {
        $data = $request->validated();
        $customer = $this->customerRepository->create($data);

        return redirect()->route('customers.index')->with('success', 'Customer created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $customer = $this->customerRepository->find($id);

        return view('customers.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $customer = $this->customerRepository->find($id);
        return view('customers.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CustomerUpdateRequest $request, $id)
    {
        $data = $request->validated();
        $blog = $this->customerRepository->update($id, $data);
        return redirect()->route('customers.index')->with('success', 'Customer updates successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
