<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Categories;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'id' => 1,
                'name'=>'Admin',
                'email'=>'admin@admin.com',
                'password'=> Hash::make('12345678'),
                'is_admin' => true
                ]
        ]);

        // DB::table('categories')->insert([
        //     [
        //         'id' => 1,
        //         'name' => 'komputer',
        //     ],
        //     [
        //         'id' => 2,
        //         'name' => 'laptop',
        //     ],
        //     [
        //         'id' => 3,
        //         'name' => 'alat-alat',
        //     ]
        // ]);

        Categories::create([
            'name'=>'Komputer',
            
        ]);
        Categories::create([
            'name'=>'Leptop',
            
        ]);
        Categories::create([
            'name'=>'Alat-alat',
            
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
            ],
            [
                'id' => 3,
                'name' => 'mouse',
                'price' => 50000,
                'description' => 'mouse dpi 2000',
                'category_id' => 3,
                'image' => '../img/mouse.jpg',
                'stock' => 20
            ],
            [
                'id' => 4,
                'name' => 'headset',
                'price' => 500000,
                'description' => 'headset dengan teknologi surround 3.0',
                'category_id' => 3,
                'image' => '../img/headphone(2).png',
                'stock' => 20
            ],
            [
                'id' => 5,
                'name' => 'keyboard',
                'price' => 450000,
                'description' => 'keyboard mechanical blue switch',
                'category_id' => 3,
                'image' => '../img/keyboard.png',
                'stock' => 20
            ]
        ]);
    }
}
