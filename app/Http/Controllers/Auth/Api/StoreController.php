<?php

namespace App\Http\Controllers\Auth\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Store;
use App\Models\StoreType;
use App\Models\User;
use App\Models\StoreFile;
use Illuminate\Support\Facades\Hash;

class StoreController extends Controller
{
    public function index()
    {
        return response()->json(Store::all(), 200);
    }
    public function getType()
    {
        $types = StoreType::all();
        return response()->json($types, 200);
    }
    public function storeWithFilesAndUser(Request $request)
    {
        \DB::beginTransaction();
        
        try {
            $request->validate([
                'store_name' => 'required|string|max:100',
                // 'type_id' => 'required|exists:store_types,id',
                // 'id_card_number' => 'required|string|max:20|unique:stores,id_card_number',
                'files.*' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
            ]);
            
    
            $user = User::create([
                'name' => $request->store_name,
                'phone_number' => $request->phone_number,
                'city' => $request->city,
                'email' => $request->email,
                'password' => \Hash::make($request->phone_number),
                'role_id' => 4,
                'status' => 0
            ]);

            $store = Store::create([
                'store_name' => $request->store_name,
                'type_id' => $request->type_id,
                'id_card_number' => $request->id_card_number,
                'owner' => $request->owner,
                'address' => $request->address,
                'postal_code' => $request->postal_code,
                'location_store' => $request->location_store,
                'phone_number' => $request->phone_number,
                'user_id' => $user->id,
                'city' => $request->city,
            ]);
            
            $uploadedFiles = [];
            $descriptions = $request->input('descriptions', []);
            if ($request->hasFile('files')) {
                foreach ($request->file('files') as $index => $file) {
                    $description = $descriptions[$index] ?? null;
                    $path = $file->store('store_files', 'public');
                    $storeFile = StoreFile::create([
                        'store_id' => $store->id,
                        'file_path' => $path,
                        'file_name' => $file->getClientOriginalName(),
                        'description' => $description,
                    ]);
    
                    $storeFile->file_path = asset('storage/' . $path); 
                    $uploadedFiles[] = $storeFile;
                }
            }
    
            \DB::commit();
    
            return response()->json([
                'message' => 'Store, user, and files created successfully',
                'store' => $store,
                'files' => $uploadedFiles,
                'user' => $user,
            ], 200);
        } catch (\Exception $e) {
            \DB::rollBack();
    
            return response()->json([
                'message' => 'Failed to create store, user, or files',
                'error' => $e->getMessage(),
            ], 500);
        }
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
