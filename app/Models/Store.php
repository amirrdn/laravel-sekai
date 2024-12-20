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
    public function files()
    {
        return $this->hasMany(StoreFile::class, 'store_id', 'id');
    }
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
