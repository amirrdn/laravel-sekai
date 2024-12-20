<x-app-layout>
    <h1 class="text-2xl font-bold mb-4">Tambah Barang</h1>
    <div class="w-full max-w-xs">
        <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" action="{{ route('items.store') }}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Nama Barang" class="w-full border p-2 rounded">
        <input type="text" name="serial_number" placeholder="Serial Number" class="w-full border p-2 rounded">
        <input type="text" name="description" placeholder="Deskripsi" class="w-full border p-2 rounded">
        <input type="number" name="price" placeholder="Harga" class="w-full border p-2 rounded">
        <input type="number" name="stock" placeholder="Stok" class="w-full border p-2 rounded">
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
    </form>
    </div>
</x-app-layout>
