<x-app-layout>
    <div class="max-w-4xl mx-auto bg-white shadow-md rounded p-6">
        <h1 class="text-3xl font-semibold mb-6 text-gray-800">Add Transaction</h1>

        <form method="POST" action="{{ route('transactions.store') }}" class="space-y-6">
            @csrf
            <!-- Serial Number Field -->
            <div class="flex flex-col">
                <label for="serial_number" class="text-sm font-medium text-gray-700">Serial Number</label>
                <input type="text" name="serial_number" id="serial_number"
                    class="mt-2 w-full border border-gray-300 rounded-md shadow-sm px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>

            <!-- Product Name Field -->
            <div class="flex flex-col">
                <label for="product_name" class="text-sm font-medium text-gray-700">Product Name</label>
                <input type="text" name="product_name" id="product_name"
                    class="mt-2 w-full border border-gray-300 rounded-md shadow-sm px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>

            <!-- Store Dropdown -->
            <div class="flex flex-col">
                <label for="store_id" class="text-sm font-medium text-gray-700">Store</label>
                <select name="store_id" id="store_id"
                    class="mt-2 w-full border border-gray-300 rounded-md shadow-sm px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    @foreach($stores as $store)
                        <option value="{{ $store->id }}">{{ $store->store_name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit"
                    class="w-full bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-200">
                    Save
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
