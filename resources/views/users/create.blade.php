<x-app-layout>
<div class="container mx-auto">
    <h1 class="text-2xl font-bold mb-4">Add User</h1>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded relative mb-4">
            <strong>Error!</strong> Please fix the following issues:
            <ul class="list-disc ml-6 mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('users.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}"
                class="w-full border p-2 rounded @error('name') border-red-500 @enderror">
            @error('name')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}"
                class="w-full border p-2 rounded @error('email') border-red-500 @enderror">
            @error('email')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="phone_number" class="block text-sm font-medium text-gray-700">Phone Number</label>
            <input type="text" name="phone_number" id="phone_number" value="{{ old('phone_number') }}"
                class="w-full border p-2 rounded @error('phone_number') border-red-500 @enderror">
            @error('phone_number')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="city" class="block text-sm font-medium text-gray-700">City</label>
            <input type="text" name="city" id="city" value="{{ old('city') }}"
                class="w-full border p-2 rounded @error('city') border-red-500 @enderror">
            @error('city')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
            <input type="password" name="password" id="password"
                class="w-full border p-2 rounded @error('password') border-red-500 @enderror">
            @error('password')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="role_id" class="block text-sm font-medium text-gray-700">Role</label>
            <select name="role_id" id="role_id"
                class="w-full border p-2 rounded @error('role_id') border-red-500 @enderror">
                <option value="">Select Role</option>
                @foreach ($roles as $role)
                    <option value="{{ $role->id }}" {{ old('role_id') == $role->id ? 'selected' : '' }}>
                        {{ $role->name }}
                    </option>
                @endforeach
            </select>
            @error('role_id')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <button type="submit"
                class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                Create
            </button>
        </div>
    </form>
</div>
</x-app-layout>