<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;
use App\Models\StoreType;
use App\Models\User;

class StoreController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stores = Store::all();

        return view('stores.index', compact('stores'));
    }

    public function create()
    {
        $storeTypes = StoreType::all();
        $users = User::whereNot('role_id', 1)->get();
        return view('stores.create', compact('storeTypes', 'users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'store_name' => 'required|string|max:100',
            'type_id' => 'required|integer',
            'user_id' => 'required',
        ]);

        $store = Store::create([
            'store_name' => $request->store_name,
            'user_id' => $request->user_id,
            'type_id' => $request->type_id,
            'id_card_number' => $request->id_card_number,
            'owner' => $request->owner,
            'address' => $request->address,
            'postal_code' => $request->postal_code,
            'location_store' => $request->location_store,
            'phone_number' => $request->phone_number,
            'city' => $request->city,
        ]);
        return redirect()->route('stores.index')->with('success', 'Store added successfully!');
    }

    public function edit(Store $store)
    {
        $storeTypes = StoreType::all();
        $users = User::whereNot('role_id', 1)->get();

        return view('stores.edit', compact('store', 'storeTypes', 'users'));
    }

    public function update(Request $request, Store $store)
    {
        $request->validate([
            'store_name' => 'required|string|max:100',
            'type_id' => 'required|integer',
        ]);

        $store->update($data);
        return redirect()->route('stores.index')->with('success', 'Store updated successfully!');
    }

    public function destroy(Store $store)
    {
        $store->delete();
        return redirect()->route('stores.index')->with('success', 'Store deleted successfully!');
    }
}
