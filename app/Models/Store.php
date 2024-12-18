<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Store extends Model
{
    use HasFactory;
    protected $table = 'stores';
    protected $fillable = [
        'store_name', 'type_id', 'id_card_number', 'owner', 'address',
        'postal_code', 'location_store', 'phone_number', 'city', 'user_id'
    ];

    public function type(){
        return $this->belongsTo(StoreType::class, 'type_id');
    }
}
