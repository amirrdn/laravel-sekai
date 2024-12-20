<x-app-layout>
    <div class="max-w-4xl mx-auto bg-white shadow-md rounded p-6">
        <h1 class="text-2xl font-bold mb-4">Edit Transaction</h1>

        <form method="POST" action="{{ route('transactions.update', $transaction->id) }}"
            class="space-y-4">
            @csrf
            @method('PUT')
            <div>
                <label class="block text-gray-700">Serial Number</label>
                <input type="text" name="serial_number" value="{{ $transaction->serial_number }}"
                    class="w-full border px-4 py-2 rounded">
            </div>
            <div>
                <label class="block text-gray-700">Product Name</label>
                <input type="text" name="product_name" value="{{ $transaction->product_name }}"
                    class="w-full border px-4 py-2 rounded">
            </div>
            <div>
                <label class="block text-gray-700">Store</label>
                <select name="store_id" class="w-full border px-4 py-2 rounded">
                    @foreach($stores as $store)
                        <option value="{{ $store->id }}" @if ($store->id == $transaction->store_id) selected @endif>
                            {{ $store->store_name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
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
