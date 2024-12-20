<x-app-layout>
    <div class="max-w-4xl mx-auto bg-white shadow-md rounded p-6">
        <h1 class="text-2xl font-bold mb-6 text-gray-700">Edit Store</h1>
        <form action="/stores/{{ $store->id }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')
    
            <div class="grid grid-cols-2 gap-6">
                <div class="space-y-4">
                    <div>
                        <label for="type_id" class="block text-sm font-medium text-gray-700">Member</label>
                        <select id="user_id" name="user_id"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                            @foreach ($users as $v)
                                <option value="{{ $v->id }}" {{ $store->user_id == $v->id ? 'selected' : '' }}>{{ $v->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="store_name" class="block text-sm font-medium text-gray-700">Store Name</label>
                        <input type="text" id="store_name" name="store_name" value="{{ old('store_name', $store->store_name) }}" placeholder="Enter store name"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    </div>
                    <div>
                        <label for="type_id" class="block text-sm font-medium text-gray-700">Store Type</label>
                        <select id="type_id" name="type_id"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                            @foreach ($storeTypes as $type)
                                <option value="{{ $type->id }}" {{ $store->type_id == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="id_card_number" class="block text-sm font-medium text-gray-700">ID Card Number</label>
                        <input type="text" id="id_card_number" name="id_card_number" value="{{ old('id_card_number', $store->id_card_number) }}" placeholder="Enter ID card number"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    </div>
                    <div>
                        <label for="owner" class="block text-sm font-medium text-gray-700">Owner</label>
                        <input type="text" id="owner" name="owner" value="{{ old('owner', $store->owner) }}" placeholder="Enter owner name"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    </div>
                </div>
    
                <div class="space-y-4">
                    <div>
                        <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                        <textarea id="address" name="address" placeholder="Enter address"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">{{ old('address', $store->address) }}</textarea>
                    </div>
                    <div>
                        <label for="postal_code" class="block text-sm font-medium text-gray-700">Postal Code</label>
                        <input type="text" id="postal_code" name="postal_code" value="{{ old('postal_code', $store->postal_code) }}" placeholder="Enter postal code"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    </div>
                    <div>
                        <label for="location_store" class="block text-sm font-medium text-gray-700">Location (Google Maps Link)</label>
                        <input type="url" id="location_store" name="location_store" value="{{ old('location_store', $store->location_store) }}" placeholder="Enter Google Maps link"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    </div>
                    <div>
                        <label for="phone_number" class="block text-sm font-medium text-gray-700">Phone Number</label>
                        <input type="text" id="phone_number" name="phone_number" value="{{ old('phone_number', $store->phone_number) }}" placeholder="Enter phone number"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    </div>
                </div>
            </div>
    
            <div class="flex justify-end">
                <button type="submit"
                    class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    Save Changes
                </button>
            </div>
        </form>
    </div>
    @push('scripts')
    <script type="module">
        $(document).ready(function() {
            $('select').select2({
                placeholder: 'Select data',
                allowClear: true
            });
        });
    </script>
    @endpush
</x-app-layout>
