<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class StoreFile extends Model
{
    use HasFactory;

    protected $fillable = [
        'store_id',
        'file_path',
        'file_name',
        'description',
    ];

    public function store()
    {
        return $this->belongsTo(Store::class);
    }
}
