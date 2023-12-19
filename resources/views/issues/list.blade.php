<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Issues list') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <a href="{{ route('issues.create') }}" class="inline-block mb-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    {{ __('Add new Product') }}
                </a>

                <div class="mx-auto">

                    @if(session('success'))
                    <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                        <span class="font-medium">Success alert!</span> {{ session('success') }}
                    </div>
                    @endif

                    @if($issues->isEmpty())
                    <p class="text-center mt-4">No Issuers to display.</p>
                    @else
                    <table class="min-w-full border border-gray-300 mb-4">
                        <thead>
                            <tr>
                                <th class="py-2 px-4 border border-gray-300">Label</th>
                                <th class="py-2 px-4 border border-gray-300">Type</th>
                                <th class="py-2 px-4 border border-gray-300">Purchase Product</th>
                                <th class="py-2 px-4 border border-gray-300">Free Product</th>
                                <th class="py-2 px-4 border border-gray-300">Purchase Quantity</th>
                                <th class="py-2 px-4 border border-gray-300">Free Quantity</th>
                                <th class="py-2 px-4 border border-gray-300">Lower Limit</th>
                                <th class="py-2 px-4 border border-gray-300">Upper Limit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($issues as $issue)
                            <tr>
                                <td class="py-2 px-4 border border-gray-300">{{ $issue->label }}</td>
                                <td class="py-2 px-4 border border-gray-300">{{ $issue->type }}</td>
                                <td class="py-2 px-4 border border-gray-300">{{ $issue->purchaseProduct->name }}</td>
                                <td class="py-2 px-4 border border-gray-300">{{ $issue->freeProduct->name }}</td>
                                <td class="py-2 px-4 border border-gray-300">{{ $issue->purchase_quantity }}</td>
                                <td class="py-2 px-4 border border-gray-300">{{ $issue->free_quantity }}</td>
                                <td class="py-2 px-4 border border-gray-300">{{ $issue->lower_limit }}</td>
                                <td class="py-2 px-4 border border-gray-300">{{ $issue->upper_limit }}</td>
                                <td class="py-2 px-4 border border-gray-300">
                                    <a href="{{ route('issues.show', $issue->id) }}" class="text-blue-500 hover:underline mr-2">
                                        View
                                    </a>
                                    <a href="{{ route('issues.edit', $issue->id) }}" class="text-blue-500 hover:underline mr-2">
                                        Edit
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $issues->links() }}
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>