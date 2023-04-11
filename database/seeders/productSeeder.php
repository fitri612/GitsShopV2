<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class productSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'id' => 1,
                'name' => 'komputer',
            ],
            [
                'id' => 2,
                'name' => 'laptop',
            ]
        ]);

        DB::table('products')->insert([
            [
                'id' => 1,
                'name' => 'Pc Gaming',
                'price' => 5000000,
                'description' => 'sebuah komputer dengan spesifikasi tinggi',
                'category_id' => 1,
                'image' => '../img/pc.png',
                'stock' => 10
            ],
            [
                'id' => 2,
                'name' => 'laptop',
                'price' => 5000000,
                'description' => 'sebuah laptop dengan spesifikasi tinggi',
                'category_id' => 2,
                'image' => '../img/laptop.png',
                'stock' => 10
            ]
        ]);
    }
}
