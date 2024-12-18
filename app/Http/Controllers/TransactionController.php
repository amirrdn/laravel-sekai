<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Transaction;
use App\Models\Store;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions = Transaction::with('store')->paginate(10);

        return view('transactions.index', [
            'transactions' => $transactions,
        ]);
    }
    public function generateQrCode($serialNumber)
    {
        return QrCode::size(100)->generate($serialNumber);
    }

    public function create()
    {
        $stores = Store::all();
        return view('transactions.create', compact('stores'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'serial_number' => 'required|string|max:50',
            'store_id' => 'required|exists:stores,id',
            'product_name' => 'required|string|max:100',
        ]);

        Transaction::create($request->all());

        return redirect()->route('transactions.index')->with('success', 'Transaction created successfully!');
    }

    public function edit(Transaction $transaction)
    {
        $stores = Store::all();
        return view('transactions.edit', compact('transaction', 'stores'));
    }

    public function update(Request $request, Transaction $transaction)
    {
        $request->validate([
            'serial_number' => 'required|string|max:50',
            'store_id' => 'required|exists:stores,id',
            'product_name' => 'required|string|max:100',
        ]);

        $transaction->update($request->all());

        return redirect()->route('transactions.index')->with('success', 'Transaction updated successfully!');
    }

    public function destroy(Transaction $transaction)
    {
        $transaction->delete();

        return redirect()->route('transactions.index')->with('success', 'Transaction deleted successfully!');
    }
}
