<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cuatomer') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <a href="{{ route('customers.create') }}" class="inline-block mb-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    {{ __('Add new Customer') }}
                </a>
                <div class="mx-auto">

                    @if(session('success'))
                    <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                        <span class="font-medium">Success alert!</span> {{ session('success') }}
                    </div>
                    @endif

                    @if($customers->isEmpty())
                    <p class="text-center mt-4">No Customers to display.</p>
                    @else
                    <table class="min-w-full border border-gray-300 mb-4">
                        <thead>
                            <tr>
                                <th class="py-2 px-4 border border-gray-300">Name</th>
                                <th class="py-2 px-4 border border-gray-300">Code</th>
                                <th class="py-2 px-4 border border-gray-300">Address</th>
                                <th class="py-2 px-4 border border-gray-300">Contact</th>
                                <th class="py-2 px-4 border border-gray-300">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($customers as $customer)
                            <tr>
                                <td class="py-2 px-4 border border-gray-300">{{ $customer->name }}</td>
                                <td class="py-2 px-4 border border-gray-300">{{ $customer->code }}</td>
                                <td class="py-2 px-4 border border-gray-300">{{ $customer->address }}</td>
                                <td class="py-2 px-4 border border-gray-300">{{ $customer->contact }}</td>
                                <td class="py-2 px-4 border border-gray-300">
                                    <a href="{{ route('customers.show', $customer->id) }}" class="text-blue-500 hover:underline mr-2">
                                        View
                                    </a>
                                    <a href="{{ route('customers.edit', $customer->id) }}" class="text-blue-500 hover:underline mr-2">
                                        Edit
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $customers->links() }}
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>