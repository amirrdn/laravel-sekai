<?php

namespace App\Http\Controllers\Auth\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Transaction;

use Illuminate\Support\Facades\Validator;

class TransactionController extends Controller
{
    public function index()
    {
        return response()->json(Transaction::with('store')->get(), 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'item_id' => 'required|exists:items,id',
            'store_id' => 'required|exists:stores,id',
            'product_name' => 'required|string',
            'serial_number' => 'required|string',
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }
    
        $transaction = Transaction::create($request->all());
        
        return response()->json([
            'status' => 'success',
            'message' => 'Transaksi berhasil dibuat',
            'data' => $transaction
        ], 200);
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
