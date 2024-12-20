<x-app-layout>
    <h1 class="text-2xl font-bold mb-4">Transactions List</h1>
    <a href="{{ route('transactions.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Add Transaction</a>
    
    <table class="w-full mt-4 bg-white border">
        <thead>
            <tr class="bg-gray-200">
                <th class="p-2">Serial Number</th>
                <th class="p-2">Product Name</th>
                <th class="p-2">Store</th>
                <th class="p-2">Created At</th>
                <th class="p-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transactions as $transaction)
            <tr class="hover:bg-gray-50">
                <td class="p-2">{{ $transaction->serial_number }}</td>
                <td class="p-2">{{ $transaction->product_name }}</td>
                <td class="p-2">{{ $transaction->store->store_name }}</td>
                <td class="p-2">{{ \Carbon\Carbon::parse($transaction->created_at)->format('Y-m-d H:i:s') }}</td>
                <td class="p-2 flex space-x-2">
                    <div class="relative inline-block text-left">
                        <button type="button" class="bg-blue-500 text-white px-4 py-2 rounded" id="dropdownButton-{{ $transaction->id }}" aria-haspopup="true" aria-expanded="false">
                            Actions
                        </button>
                    
                        <div id="dropdownMenu-{{ $transaction->id }}" class="dropdown-menu hidden absolute right-0 z-10 w-48 py-2 mt-2 bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5">
                            <a href="{{ route('transactions.edit', $transaction->id) }}" class="block px-4 py-2 text-sm text-yellow-500 hover:bg-gray-100">Edit</a>
                            <form action="{{ route('transactions.destroy', $transaction->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="block px-4 py-2 text-sm text-red-500 hover:bg-gray-100">Delete</button>
                            </form>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    <div class="mt-4">
        {{ $transactions->links() }}
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
