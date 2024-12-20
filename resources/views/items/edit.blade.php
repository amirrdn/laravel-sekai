<x-app-layout>
    <h1 class="text-2xl font-bold mb-4">Edit Barang</h1>

    <form action="{{ route('items.update', $item->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')
        
        <div class="space-y-2">
            <label for="name" class="block text-sm font-medium text-gray-700">Nama Barang</label>
            <input 
                type="text" 
                name="name" 
                id="name" 
                placeholder="Nama Barang" 
                value="{{ old('name', $item->name) }}" 
                class="w-full border p-2 rounded focus:ring focus:ring-blue-200 hover:border-blue-500">
        </div>
        
        <div class="space-y-2">
            <label for="serial_number" class="block text-sm font-medium text-gray-700">Serial Number</label>
            <input 
                type="text" 
                name="serial_number" 
                id="serial_number" 
                placeholder="Serial Number" 
                value="{{ old('serial_number', $item->serial_number) }}" 
                class="w-full border p-2 rounded focus:ring focus:ring-blue-200 hover:border-blue-500">
        </div>

        <div class="space-y-2">
            <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
            <input 
                type="text" 
                name="description" 
                id="description" 
                placeholder="Deskripsi" 
                value="{{ old('description', $item->description) }}" 
                class="w-full border p-2 rounded focus:ring focus:ring-blue-200 hover:border-blue-500">
        </div>
        
        <div class="space-y-2">
            <label for="price" class="block text-sm font-medium text-gray-700">Harga</label>
            <input 
                type="number" 
                name="price" 
                id="price" 
                placeholder="Harga" 
                value="{{ old('price', $item->price) }}" 
                class="w-full border p-2 rounded focus:ring focus:ring-blue-200 hover:border-blue-500">
        </div>

        <div class="space-y-2">
            <label for="stock" class="block text-sm font-medium text-gray-700">Stok</label>
            <input 
                type="number" 
                name="stock" 
                id="stock" 
                placeholder="Stok" 
                value="{{ old('stock', $item->stock) }}" 
                class="w-full border p-2 rounded focus:ring focus:ring-blue-200 hover:border-blue-500">
        </div>

        <div class="mt-4">
            <p class="text-sm font-medium text-gray-700">QR Code</p>
            <div class="mt-2 border p-4 bg-gray-50 shadow-sm">{!! QrCode::size(100)->generate($item->serial_number) !!}</div>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:ring focus:ring-blue-200">Update</button>
    </form>
</x-app-layout>
