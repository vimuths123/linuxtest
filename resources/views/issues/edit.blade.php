<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update Issue'). ' - '. $issue->label }}
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


                    <form method="post" action="{{ route('issues.update', $issue->id) }}" class="mt-6 space-y-6"
                     x-data="{ purchaseProductId: '{{ old('purchase_product_id', $issue->purchase_product_id) }}', freeProductId: '{{ old('free_product_id', $issue->free_product_id) }}' }">
                        @csrf
                        @method('PUT')
                        <div>
                            <x-input-label for="label" :value="__('Free issue Label')" />
                            <x-text-input id="label" name="label" type="text" class="mt-1 block w-full" :value="old('label', $issue->label)" autofocus autocomplete="label" />
                            <x-input-error class="mt-2" :messages="$errors->get('label')" />
                        </div>

                        <div>
                            <x-input-label for="type" :value="__('Type')" />
                            <select id="type" name="type" class="p-2 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full">
                                <option value="" x-bind:selected="type === ''">Select a Type</option>
                                <option value="flat" x-bind:selected="type === 'flat' || '{{ old('type', $issue->type) }}' === 'flat'">Flat</option>
                                <option value="multiple" x-bind:selected="type === 'multiple' || '{{ old('type', $issue->type) }}' === 'multiple'">Multiple</option>
                            </select>
                            <x-input-error :messages="$errors->get('type')" />
                        </div>

                        <div>
                            <x-input-label for="purchase_product_id" :value="__('Purchase Product')" />
                            <select x-model="purchaseProductId" @change="freeProductId = purchaseProductId" id="purchase_product_id" name="purchase_product_id" class="p-2 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full">
                                <option value="">Select a Product</option>
                                @foreach($products as $product)
                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('purchase_product_id')" />
                        </div>

                        <div>
                            <x-input-label for="free_product_id" :value="__('Free Product')" />
                            <select x-model="freeProductId" id="free_product_id" name="free_product_id" class="p-2 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full">
                                <option value="">Select a Product</option>
                                @foreach($products as $product)
                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('free_product_id')" />
                        </div>

                        <div>
                            <x-input-label for="purchase_quantity" :value="__('Purchase Quantity')" />
                            <x-text-input id="purchase_quantity" name="purchase_quantity" type="text" class="mt-1 block w-full" :value="old('purchase_quantity', $issue->purchase_quantity)" autofocus autocomplete="purchase_quantity" />
                            <x-input-error class="mt-2" :messages="$errors->get('purchase_quantity')" />
                        </div>

                        <div>
                            <x-input-label for="free_quantity" :value="__('Free Quantity')" />
                            <x-text-input id="free_quantity" name="free_quantity" type="text" class="mt-1 block w-full" :value="old('free_quantity', $issue->free_quantity)" autofocus autocomplete="free_quantity" />
                            <x-input-error class="mt-2" :messages="$errors->get('free_quantity')" />
                        </div>

                        <div>
                            <x-input-label for="lower_limit" :value="__('Lower Limit')" />
                            <x-text-input id="lower_limit" name="lower_limit" type="text" class="mt-1 block w-full" :value="old('lower_limit', $issue->lower_limit)" autofocus autocomplete="lower_limit" />
                            <x-input-error class="mt-2" :messages="$errors->get('lower_limit')" />
                        </div>

                        <div>
                            <x-input-label for="upper_limit" :value="__('Upper Limit')" />
                            <x-text-input id="upper_limit" name="upper_limit" type="text" class="mt-1 block w-full" :value="old('upper_limit', $issue->upper_limit)" autofocus autocomplete="upper_limit" />
                            <x-input-error class="mt-2" :messages="$errors->get('upper_limit')" />
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