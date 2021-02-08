<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
           'name' => 'Samsung Galaxy S9',
           'price' => 698.88,
           'created_at' => date('Y-m-d H:i:s'),
           'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('products')->insert([
            'name' => 'Apple iPhone X',
            'price' => 983.00,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('products')->insert([
            'name' => 'Google Pixel 2 XL',
            'price' => 675.00,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('products')->insert([
            'name' => 'LG V10 H900',
            'price' => 159.99,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('products')->insert([
            'name' => 'Huawei Elate',
            'price' => 68.00,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('products')->insert([
            'name' => 'HTC One M10',
            'price' => 129.99,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
