<?php

namespace App\Http\Controllers\Auth\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Transaction;

class TransactionController extends Controller
{
    public function index()
    {
        return response()->json(Transaction::with('store')->get(), 200);
    }

    public function store(Request $request)
    {
        $transaction = Transaction::create($request->all());
        return response()->json($transaction, 201);
    }
    public function validateQR(Request $request)
    {
        $validated = $request->validate([
            'serial_number' => 'required|string',
        ]);

        $transaction = Transaction::where('serial_number', $validated['serial_number'])->first();

        if ($transaction) {
            return response()->json([
                'status' => 'success',
                'message' => 'Transaction found.',
                'data' => $transaction,
            ]);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Transaction not found.',
        ], 404);
    }
}
