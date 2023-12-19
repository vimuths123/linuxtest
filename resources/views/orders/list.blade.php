<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Order View') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <a href="{{ route('orders.create') }}" class="inline-block mb-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    {{ __('Add new Order') }}
                </a>

                <div class="mx-auto">

                    @if(session('success'))
                    <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                        <span class="font-medium">Success alert!</span> {{ session('success') }}
                    </div>
                    @endif


                    @if($orders->isEmpty())
                    <p class="text-center mt-4">No Orders to display.</p>
                    @else
                    <table class="min-w-full border border-gray-300 mb-4">
                        <thead>
                            <tr>
                                <th class="py-2 px-4 border border-gray-300">Order Number</th>
                                <th class="py-2 px-4 border border-gray-300">Customer Name</th>
                                <th class="py-2 px-4 border border-gray-300">Order Date</th>
                                <th class="py-2 px-4 border border-gray-300">Order Time</th>
                                <th class="py-2 px-4 border border-gray-300">Net Amount</th>
                                <th class="py-2 px-4 border border-gray-300">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                            <tr>
                                <td class="py-2 px-4 border border-gray-300">{{ $order->order_number }}</td>
                                <td class="py-2 px-4 border border-gray-300">{{ $order->customer->name }}</td>
                                <td class="py-2 px-4 border border-gray-300">{{ $order->order_date }}</td>
                                <td class="py-2 px-4 border border-gray-300">{{ $order->order_time }}</td>
                                <td class="py-2 px-4 border border-gray-300">{{ $order->net_amount }}</td>
                                <td class="py-2 px-4 border border-gray-300">
                                    <a href="{{ route('orders.show', $order->id) }}" class="text-blue-500 hover:underline mr-2">
                                        View
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $orders->links() }}
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>