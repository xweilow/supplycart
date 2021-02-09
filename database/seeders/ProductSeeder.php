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
            'category_id' => 1,
            'brand' => 'Samsung',
            'name' => 'Samsung Galaxy S9',
            'price' => 698.88,
            'vip_price' => 628.88,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('products')->insert([
            'category_id' => 1,
            'brand' => 'Apple',
            'name' => 'Apple iPhone X',
            'price' => 983.00,
            'vip_price' => 920.00,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('products')->insert([
            'category_id' => 1,
            'brand' => 'Google',
            'name' => 'Google Pixel 2 XL',
            'price' => 675.00,
            'vip_price' => 628.88,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('products')->insert([
            'category_id' => 1,
            'brand' => 'LG',
            'name' => 'LG V10 H900',
            'price' => 159.99,
            'vip_price' => 129.99,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('products')->insert([
            'category_id' => 1,
            'brand' => 'Huawei',
            'name' => 'Huawei Elate',
            'price' => 68.00,
            'vip_price' => 55.00,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('products')->insert([
            'category_id' => 1,
            'brand' => 'HTC',
            'name' => 'HTC One M10',
            'price' => 129.99,
            'vip_price' => 111.88,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('products')->insert([
            'category_id' => 2,
            'brand' => 'Apple',
            'name' => 'Macbook Pro',
            'price' => 3699.99,
            'vip_price' => 3299.99,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('products')->insert([
            'category_id' => 2,
            'brand' => 'Samsung',
            'name' => 'Samsung Galaxy Book',
            'price' => 2899.00,
            'vip_price' => 2188.00,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('products')->insert([
            'category_id' => 2,
            'brand' => 'LG',
            'name' => 'LG Gram 14"',
            'price' => 2699.00,
            'vip_price' => 2550.00,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('products')->insert([
            'category_id' => 3,
            'brand' => 'Apple',
            'name' => 'Apple TV',
            'price' => 5999.00,
            'vip_price' => 5799.00,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('products')->insert([
            'category_id' => 3,
            'brand' => 'Samsung',
            'name' => 'Samsung Airy White',
            'price' => 1200.00,
            'vip_price' => 1100.00,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('products')->insert([
            'category_id' => 3,
            'brand' => 'LG',
            'name' => 'LG NanoCell 99 Series 2020 75 inch',
            'price' => 2000.00,
            'vip_price' => 1888.99,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
