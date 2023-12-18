<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create a Order') }}
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


                    <a href="{{ route('orders.index') }}" class="text-blue-500 hover:underline mr-2">Back to list</a>

                    <form method="post" class="mt-6 space-y-6">

                        <div>
                            <x-input-label for="name" :value="__('Order Number')" />
                            <p>{{ $order->order_number }}</p>
                        </div>

                        <div>
                            <x-input-label for="code" :value="__('Customer Name')" />
                            <p>{{ $order->customer->name }}</p>
                        </div>

                        <div>
                            <x-input-label for="price" :value="__('Order Date')" />
                            <p>{{ $order->order_date }}</p>
                        </div>

                        <div>
                            <x-input-label for="expiry_date" :value="__('Order Time')" />
                            <p>{{ $order->order_time }}</p>
                        </div>

                        <div>
                            <x-input-label for="expiry_date" :value="__('Net Amount')" />
                            <p>{{ $order->net_amount }}</p>
                        </div>


                        <table class="min-w-full border border-gray-300 mb-4">
                            <thead>
                                <tr>
                                    <th class="py-2 px-4 border border-gray-300">Product Name</th>
                                    <th class="py-2 px-4 border border-gray-300">Product Code</th>
                                    <th class="py-2 px-4 border border-gray-300">Product Price</th>
                                    <th class="py-2 px-4 border border-gray-300">Quantity</th>
                                    <th class="py-2 px-4 border border-gray-300">Net Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($order->products as $product)
                                <tr>
                                    <td class="py-2 px-4 border border-gray-300">{{ $product->name }}</td>
                                    <td class="py-2 px-4 border border-gray-300">{{ $product->code }}</td>
                                    <td class="py-2 px-4 border border-gray-300">{{ $product->price }}</td>
                                    <td class="py-2 px-4 border border-gray-300">{{ $product->pivot->quantity }}</td>
                                    <td class="py-2 px-4 border border-gray-300">{{ $product->pivot->amount }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>



                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>