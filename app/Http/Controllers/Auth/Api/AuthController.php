<?php

namespace App\Http\Controllers\Auth\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Store;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::with('store.type')->where('email', $request->email)->first();
        if ($user && Hash::check($request->password, $user->password)) {
            $token = $user->createToken('api-token')->plainTextToken;

            return response()->json([
                'status' => 'success',
                'message' => 'Login successful',
                'data' => $user,
                'token' => $token,
                'type' => 'user',
            ]);
        }

        return response()->json(['message' => 'Invalid credentials'], 401);
    }
    public function changePassword(Request $request)
    {
        try {
            $request->validate([
                'old_password' => 'required',
                'new_password' => 'required|min:8|confirmed',
            ]);
    
            $user = Auth::user();
    
            if (!Hash::check($request->old_password, $user->password)) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Password lama tidak sesuai.',
                ], 422);
            }
            $user->update([
                'password' => Hash::make($request->new_password),
            ]);
    
            return response()->json([
                'status' => 'success',
                'message' => 'Password berhasil diubah.',
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Terjadi kesalahan saat mengubah password.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }    
}
