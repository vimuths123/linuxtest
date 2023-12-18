<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Place a Order') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">

                    @if(session('success'))
                    <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                        <span class="font-medium">Success alert!</span> {{ session('success') }}
                    </div>
                    @endif


                    <form method="post" action="{{ route('order.store') }}" class="mt-6 space-y-6">
                        @csrf

                        <div>
                            <x-input-label for="customer_id" :value="__('Customer Name')" />
                            <select x-model="customer_id" id="customer_id" name="customer_id" class="p-2 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full">
                                <option value="">Select a Customer</option>
                                @foreach($customers as $customer)
                                <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('customer_id')" />
                        </div>

                        <div>
                            <x-input-label for="order_number" :value="__('Order Number')" />
                            <x-text-input id="label" name="order_number" type="text" class="mt-1 block w-full" readonly :value="$order_number" autofocus autocomplete="label" />
                            <x-input-error class="mt-2" :messages="$errors->get('order_number')" />
                        </div>

                        <div x-data="{ products: [], totalReduction: 0 }">
                            <template x-for="(product, index) in products" :key="index">
                                <div class="flex items-center space-x-4 mt-4">
                                    <select x-model="product.product_id" name="product_id[]" class="p-2 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" @change="updateProduct(product)">
                                        <option value="">Select a Product</option>
                                        @foreach($products as $p)
                                        <option value="{{ $p->id }}" data-code="{{ $p->code }}" data-price="{{ $p->price }}">{{ $p->name }}</option>
                                        @endforeach
                                    </select>
                                    <input x-model="product.price" type="text" name="price[]" class="p-2 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" readonly placeholder="Product price">
                                    <input x-model="product.code" type="text" name="code[]" class="p-2 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" readonly placeholder="Product code">
                                    <input x-model="product.quantity" @input="updateReduction(product)" type="number" name="quantity[]" class="p-2 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" placeholder="Quantity">
                                    <input x-model="product.free" @input="updateReduction(product)" type="number" name="free[]" class="p-2 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" placeholder="Free quantity">
                                    <input x-model="product.reduction" type="number" name="reduction[]" class="p-2 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" placeholder="Reduction amount" readonly>
                                    <button type="button" @click="products.splice(index, 1)" class="text-red-500">Remove</button>
                                </div>
                            </template>
                            <!-- <button type="button" @click="add(products)" class="mt-4">Add Product</button> -->
                            <button type="button" @click="products.push({ product_id: '', price: '', quantity: '', free: '', reduction: '' })" class="mt-4">Add Product</button>


                            <script>
                                function updateProduct(product) {
                                    const selectedOption = document.querySelector(`[value="${product.product_id}"]:checked`);
                                    const price = selectedOption ? selectedOption.getAttribute('data-price') : '';
                                    const code = selectedOption ? selectedOption.getAttribute('data-code') : '';

                                    product.price = price;
                                    product.code = code;
                                }

                                function updateReduction(product) {
                                    // Calculate reduction based on quantity and free
                                    const quantity = parseFloat(product.quantity) || 0;
                                    const free = parseFloat(product.free) || 0;
                                    const reduction = (quantity - free) * product.price;

                                    product.reduction = reduction;
                                }

                              
                            </script>
                        </div>




                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Save') }}</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>