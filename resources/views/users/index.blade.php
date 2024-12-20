<x-app-layout>
<div class="container mx-auto">
    <h1 class="text-2xl font-bold mb-4">User List</h1>
    <a href="{{ route('users.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Add User</a>

    <table class="w-full mt-4 bg-white border">
        <thead>
            <tr>
                <th class="border px-4 py-2">Name</th>
                <th class="border px-4 py-2">Email</th>
                <th class="border px-4 py-2">Phone</th>
                <th class="border px-4 py-2">City</th>
                <th class="border px-4 py-2">Role</th>
                <th class="border px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td class="border px-4 py-2">{{ $user->name }}</td>
                    <td class="border px-4 py-2">{{ $user->email }}</td>
                    <td class="border px-4 py-2">{{ $user->phone_number }}</td>
                    <td class="border px-4 py-2">{{ $user->city }}</td>
                    <td class="border px-4 py-2">{{ $user->role->name }}</td>
                    <td class="border px-4 py-2">
                        <div class="relative inline-block text-left">
                            <button type="button" class="bg-blue-500 text-white px-4 py-2 rounded" id="dropdownButton" aria-haspopup="true" aria-expanded="false">
                                Actions
                            </button>
                        
                            <div id="dropdownMenu" class="dropdown-menu hidden absolute right-0 z-10 w-48 py-2 mt-2 bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5">
                                <a href="{{ route('users.edit', $user->id) }}" class="block px-4 py-2 text-sm text-yellow-500 hover:bg-gray-100">Edit</a>
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <a href="javascript:void(0)" class="block px-4 py-2 text-sm text-red-500 hover:bg-gray-100" onclick="return confirm('Are you sure?')">Delete</button>
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
    const dropdownButton = document.getElementById('dropdownButton');
    const dropdownMenu = document.getElementById('dropdownMenu');

    dropdownButton.addEventListener('click', function() {
        dropdownMenu.classList.toggle('hidden');
    });

    document.addEventListener('click', function(event) {
        if (!dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
            dropdownMenu.classList.add('hidden');
        }
    });
</script>
@endpush
</x-app-layout>