<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    
    protected $fillable = ['serial_number', 'store_id', 'product_name', 'item_id'];

    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id');
    }
}
