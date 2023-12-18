<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create a Product') }}
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


                    <a href="{{ route('products.index') }}" class="text-blue-500 hover:underline mr-2">Back to list</a>

                    <form method="post" action="{{ route('products.store') }}" class="mt-6 space-y-6">
                        @csrf
                        <div>
                            <x-input-label for="name" :value="__('Product Name')" />
                            <p>{{ $product->name }}</p>
                        </div>

                        <div>
                            <x-input-label for="code" :value="__('Product Code')" />
                            <p>{{ $product->code }}</p>
                        </div>

                        <div>
                            <x-input-label for="price" :value="__('Price')" />
                            <p>{{ $product->price }}</p>
                        </div>

                        <div>
                            <x-input-label for="expiry_date" :value="__('Expiry Date')" />
                           <p>{{ $product->expiry_date }}</p>
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