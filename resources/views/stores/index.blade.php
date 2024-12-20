<x-app-layout>
    <h1 class="text-2xl font-bold mb-4">Stores List</h1>
    <a href="{{ route('stores.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Add Store</a>
    
    <div class="table-responsive">
    <table class="w-full mt-4 bg-white border">
        <thead>
            <tr class="bg-gray-200">
                <th class="p-2">Name Toko</th>
                <th class="p-2">Jenis</th>
                <th class="p-2">No. Telp</th>
                <th class="p-2">Email</th>
                <th class="p-2">Kota</th>
                <th class="p-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($stores as $store)
            <tr class="hover:bg-gray-50">
                <td class="p-2">{{ $store->store_name }}</td>
                <td class="p-2">{{ $store->type->name }}</td>
                <td class="p-2">{{ $store->phone_number }}</td>
                <td class="p-2">{{ $store->user->email }}</td>
                <td class="p-2">{{ $store->city }}</td>
                <td class="p-2 flex space-x-2">
                    <div class="relative inline-block text-left">
                        <button type="button" class="bg-blue-500 text-white px-4 py-2 rounded" id="dropdownButton-{{ $store->id }}" aria-haspopup="true" aria-expanded="false">
                            Actions
                        </button>
                    
                        <div id="dropdownMenu-{{ $store->id }}" class="dropdown-menu hidden absolute right-0 z-10 w-48 py-2 mt-2 bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5">
                            <a href="{{ route('stores.edit', $store->id) }}" class="block px-4 py-2 text-sm text-yellow-500 hover:bg-gray-100">Edit</a>
                            <form action="{{ route('stores.destroy', $store->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <a href="javascript:void(0)" class="block px-4 py-2 text-sm text-red-500 hover:bg-gray-100" onclick="return confirm('Are you sure?')">Delete</a>
                            </form>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
    
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
    </x-app-layout>
    