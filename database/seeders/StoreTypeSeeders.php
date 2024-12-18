<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\StoreType;

class StoreTypeSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $store = ['Electronics', 'Clothing', 'Furniture', 'Automotive'];

        foreach ($store as $v) {
            StoreType::create(['name' => $v]);
        }
    }
}
