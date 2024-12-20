<x-app-layout>
    <h1 class="text-2xl font-bold mb-4">Daftar Barang</h1>
    <a href="{{ route('items.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Tambah Barang</a>

    <table class="w-full mt-4 bg-white border">
        <thead>
            <tr class="bg-gray-200">
                <th class="p-2">ID</th>
                <th class="p-2">Nama Barang</th>
                <th class="p-2">Serial Number</th>
                <th class="p-2">QRCode</th>
                <th class="p-2">Stok</th>
                <th class="p-2">Harga</th>
                <th class="p-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $item)
                <tr class="hover:bg-gray-50">
                    <td class="p-2">{{ $item->id }}</td>
                    <td class="p-2">{{ $item->name }}</td>
                    <td class="p-2">{{ $item->serial_number }}</td>
                    <td class="p-2">
                        {!! QrCode::size(100)->generate($item->serial_number) !!}
                    </td>
                    <td class="p-2">{{ $item->stock }}</td>
                    <td class="p-2">{{ $item->price }}</td>
                    <td class="p-2">
                        <a href="{{ route('items.edit', $item->id) }}" class="text-yellow-500">Edit</a>
                        <form action="{{ route('items.destroy', $item->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-app-layout>
