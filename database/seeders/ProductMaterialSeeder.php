<?php

namespace Database\Seeders;

use App\Models\ProductMaterial;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductMaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductMaterial::create(
            [
                'product_id'=>1,
                'material_id'=>1,
                'miqdori'=>0.4
            ]
        );
        ProductMaterial::create(
            [
                'product_id'=>1,
                'material_id'=>3,
                'miqdori'=>5
            ]
        );
        ProductMaterial::create(
            [
                'product_id'=>1,
                'material_id'=>2,
                'miqdori'=>010
            ]
        );
        ProductMaterial::create(
            [
                'product_id'=>2,
                'material_id'=>1,
                'miqdori'=>1.4
            ]
        );
        ProductMaterial::create(
            [
                'product_id'=>2,
                'material_id'=>2,
                'miqdori'=>15
            ]
        );
        ProductMaterial::create(
            [
                'product_id'=>2,
                'material_id'=>4,
                'miqdori'=>1
            ]
        );

    }
}
