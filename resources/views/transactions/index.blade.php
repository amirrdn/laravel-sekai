<x-app-layout>
    <h1 class="text-2xl font-bold mb-4">Transactions List</h1>
    <a href="{{ route('transactions.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Add Transaction</a>
    
    <table class="w-full mt-4 bg-white border">
        <thead>
            <tr class="bg-gray-200">
                <th class="p-2">Serial Number</th>
                <th class="p-2">Product Name</th>
                <th class="p-2">Store</th>
                <th class="p-2">Scanned At</th>
                <th class="p-2">QR Code</th>
                <th class="p-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transactions as $transaction)
            <tr class="hover:bg-gray-50">
                <td class="p-2">{{ $transaction->serial_number }}</td>
                <td class="p-2">{{ $transaction->product_name }}</td>
                <td class="p-2">{{ $transaction->store->store_name }}</td>
                <td class="p-2">{{ $transaction->scanned_at }}</td>
                <td class="p-2">
                    {!! QrCode::size(100)->generate($transaction->serial_number) !!}
                </td>
                <td class="p-2 flex space-x-2">
                    <a href="{{ route('transactions.edit', $transaction->id) }}" class="text-yellow-500">Edit</a>
                    <form action="{{ route('transactions.destroy', $transaction->id) }}" method="POST">
                        @csrf @method('DELETE')
                        <button type="submit" class="text-red-500">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    <div class="mt-4">
        {{ $transactions->links() }}
    </div>
    </x-app-layout>
    