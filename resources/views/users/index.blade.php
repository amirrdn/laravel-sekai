<x-app-layout>
<div class="container mx-auto">
    <h1 class="text-2xl font-bold mb-4">User List</h1>
    <a href="{{ route('users.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Add User</a>

    <table class="table-auto w-full mt-4">
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
                        <a href="{{ route('users.edit', $user->id) }}" class="text-yellow-500">Edit</a> |
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</x-app-layout>