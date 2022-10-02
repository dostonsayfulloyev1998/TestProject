<?php

namespace Database\Seeders;

use App\Models\Omborxona;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OmborxonaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Omborxona::create([
            'material_id'=>1,
            'miqdori'=>12,
            'price'=>1500
        ]);

        Omborxona::create([
            'material_id'=>1,
            'miqdori'=>200,
            'price'=>1600
        ]);

        Omborxona::create([
            'material_id'=>2,
            'miqdori'=>40,
            'price'=>500
        ]);

        Omborxona::create([
            'material_id'=>2,
            'miqdori'=>300,
            'price'=>550
        ]);

        Omborxona::create([
            'material_id'=>3,
            'miqdori'=>500,
            'price'=>300
        ]);

        Omborxona::create([
            'material_id'=>4,
            'miqdori'=>1000,
            'price'=>2000
        ]);

    }
}
