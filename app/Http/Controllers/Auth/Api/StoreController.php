<?php

namespace App\Http\Controllers\Auth\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Store;
use Illuminate\Support\Facades\Hash;

class StoreController extends Controller
{
    public function index()
    {
        return response()->json(Store::all(), 200);
    }

    public function store(Request $request)
    {
        $store = Store::create($request->all());
        return response()->json($store, 201);
    }
    public function login(Request $request)
    {
        $request->validate([
            'store_email' => 'required|email',
            'password' => 'required',
        ]);

        $store = Store::where('store_email', $request->store_email)->first();

        if (!$store || !Hash::check($request->password, $store->password)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        $token = $store->createToken('api-token')->plainTextToken;

        return response()->json([
            'store' => $store,
            'token' => $token,
        ]);
    }
}
