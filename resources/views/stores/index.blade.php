<x-app-layout>
<h1 class="text-2xl font-bold mb-4">Stores List</h1>
<a href="{{ route('stores.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Add Store</a>

<table class="w-full mt-4 bg-white border">
    <thead>
        <tr class="bg-gray-200">
            <th class="p-2">Store Name</th>
            <th class="p-2">Email</th>
            <th class="p-2">City</th>
            <th class="p-2">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($stores as $store)
        <tr class="hover:bg-gray-50">
            <td class="p-2">{{ $store->store_name }}</td>
            <td class="p-2">{{ $store->store_email }}</td>
            <td class="p-2">{{ $store->city }}</td>
            <td class="p-2 flex space-x-2">
                <a href="{{ route('stores.edit', $store->id) }}" class="text-yellow-500">Edit</a>
                <form action="{{ route('stores.destroy', $store->id) }}" method="POST">
                    @csrf @method('DELETE')
                    <button type="submit" class="text-red-500">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</x-app-layout>
