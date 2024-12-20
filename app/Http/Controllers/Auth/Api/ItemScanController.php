<?php

namespace App\Http\Controllers\Auth\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Item;

class ItemScanController extends Controller
{
    public function scan(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'qrcode' => 'required|string',
        ]);

        $item = Item::where('name', $request->name)
            ->where('serial_number', $request->qrcode)
            ->first();

        if (!$item) {
            return response()->json([
                'status' => 'error',
                'message' => 'Item not found or QR code mismatch.',
            ], 404);
        }

        // Jika barang ditemukan
        return response()->json([
            'status' => 'success',
            'message' => 'Item found.',
            'data' => $item,
        ], 200);
    }
}
