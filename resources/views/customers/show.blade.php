<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create a Customer') }}
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


                    <a href="{{ route('customers.index') }}" class="text-blue-500 hover:underline mr-2">Back to list</a>

                    <form method="post" action="{{ route('customers.store') }}" class="mt-6 space-y-6">
                        @csrf
                        <div>
                            <x-input-label for="name" :value="__('Customer Name')" />
                            <p>{{ $customer->name }}</p>
                        </div>

                        <div>
                            <x-input-label for="code" :value="__('Customer Code')" />
                            <p>{{ $customer->code }}</p>
                        </div>

                        <div>
                            <x-input-label for="address" :value="__('Address')" />
                            <p>{{ $customer->address }}</p>
                        </div>

                        <div>
                            <x-input-label for="contact" :value="__('Contact')" />
                           <p>{{ $customer->contact }}</p>
                        </div>



                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>