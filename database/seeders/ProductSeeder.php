<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name'=>"Ko`ylak",
            'code'=>100
        ]);

        Product::create([
            'name'=>"Shim",
            'code'=>200
        ]);
    }
}
