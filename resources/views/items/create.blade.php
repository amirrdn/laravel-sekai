<x-app-layout>
    <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg p-8">
        <h1 class="text-3xl font-semibold mb-6 text-center">Tambah Barang</h1>

        <form class="space-y-6" action="{{ route('items.store') }}" method="POST">
            @csrf
            <!-- Name Field -->
            <div class="flex flex-col">
                <label for="name" class="text-sm font-medium text-gray-700">Nama Barang</label>
                <input 
                    type="text" 
                    id="name" 
                    name="name" 
                    placeholder="Nama Barang" 
                    class="mt-2 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" 
                    value="{{ old('name') }}"
                >
                @error('name') 
                    <span class="text-red-500 text-sm">{{ $message }}</span> 
                @enderror
            </div>

            <!-- Serial Number Field -->
            <div class="flex flex-col">
                <label for="serial_number" class="text-sm font-medium text-gray-700">Serial Number</label>
                <input 
                    type="text" 
                    id="serial_number" 
                    name="serial_number" 
                    placeholder="Serial Number" 
                    class="mt-2 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" 
                    value="{{ old('serial_number') }}"
                >
                @error('serial_number') 
                    <span class="text-red-500 text-sm">{{ $message }}</span> 
                @enderror
            </div>

            <!-- Description Field -->
            <div class="flex flex-col">
                <label for="description" class="text-sm font-medium text-gray-700">Deskripsi</label>
                <input 
                    type="text" 
                    id="description" 
                    name="description" 
                    placeholder="Deskripsi" 
                    class="mt-2 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" 
                    value="{{ old('description') }}"
                >
                @error('description') 
                    <span class="text-red-500 text-sm">{{ $message }}</span> 
                @enderror
            </div>

            <!-- Price Field -->
            <div class="flex flex-col">
                <label for="price" class="text-sm font-medium text-gray-700">Harga</label>
                <input 
                    type="number" 
                    id="price" 
                    name="price" 
                    placeholder="Harga" 
                    class="mt-2 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" 
                    value="{{ old('price') }}"
                >
                @error('price') 
                    <span class="text-red-500 text-sm">{{ $message }}</span> 
                @enderror
            </div>

            <!-- Stock Field -->
            <div class="flex flex-col">
                <label for="stock" class="text-sm font-medium text-gray-700">Stok</label>
                <input 
                    type="number" 
                    id="stock" 
                    name="stock" 
                    placeholder="Stok" 
                    class="mt-2 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" 
                    value="{{ old('stock') }}"
                >
                @error('stock') 
                    <span class="text-red-500 text-sm">{{ $message }}</span> 
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="flex justify-center">
                <button type="submit" class="bg-blue-500 text-white px-6 py-3 rounded-lg hover:bg-blue-600 transition duration-300">Simpan</button>
            </div>
        </form>
    </div>
</x-app-layout>
