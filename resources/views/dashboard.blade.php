<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex space-x-4">

                        <a href="{{ route('products.index') }}" class="inline-block mb-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            {{ __('Products') }}
                        </a>

                        <a href="{{ route('customers.index') }}" class="inline-block mb-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            {{ __('Customers') }}
                        </a>

                        <a href="{{ route('issues.index') }}" class="inline-block mb-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            {{ __('Issues') }}
                        </a>

                        <a href="{{ route('orders.index') }}" class="inline-block mb-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            {{ __('Orders') }}
                        </a>

                        


                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>