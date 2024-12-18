<x-app-layout>
<h1 class="text-2xl font-bold mb-4">Add Transaction</h1>

<form method="POST" action="{{ route('transactions.store') }}" class="space-y-4">
    @csrf
    <div>
        <label class="block text-gray-700">Serial Number</label>
        <input type="text" name="serial_number" class="w-full border px-4 py-2 rounded">
    </div>
    <div>
        <label class="block text-gray-700">Product Name</label>
        <input type="text" name="product_name" class="w-full border px-4 py-2 rounded">
    </div>
    <div>
        <label class="block text-gray-700">Store</label>
        <select name="store_id" class="w-full border px-4 py-2 rounded">
            @foreach ($stores as $store)
            <option value="{{ $store->id }}">{{ $store->store_name }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
</form>
</x-app-layout>