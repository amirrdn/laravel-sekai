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
                        <div class="relative inline-block text-left">
                            <button type="button" class="bg-blue-500 text-white px-4 py-2 rounded" id="dropdownButton-{{ $item->id }}" aria-haspopup="true" aria-expanded="false">
                                Actions
                            </button>
                        
                            <div id="dropdownMenu-{{ $item->id }}" class="dropdown-menu hidden absolute right-0 z-10 w-48 py-2 mt-2 bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5">
                                <a href="{{ route('items.edit', $item->id) }}" class="block px-4 py-2 text-sm text-yellow-500 hover:bg-gray-100">Edit</a>
                                <form action="{{ route('items.destroy', $item->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="block px-4 py-2 text-sm text-red-500 hover:bg-gray-100">Hapus</button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-app-layout>

@push('scripts')
<script>
    const dropdownButtons = document.querySelectorAll('[id^="dropdownButton-"]');
    const dropdownMenus = document.querySelectorAll('[id^="dropdownMenu-"]');

    dropdownButtons.forEach((button, index) => {
        button.addEventListener('click', function() {
            dropdownMenus[index].classList.toggle('hidden');
        });
    });

    document.addEventListener('click', function(event) {
        dropdownButtons.forEach((button, index) => {
            if (!button.contains(event.target) && !dropdownMenus[index].contains(event.target)) {
                dropdownMenus[index].classList.add('hidden');
            }
        });
    });
</script>
@endpush
