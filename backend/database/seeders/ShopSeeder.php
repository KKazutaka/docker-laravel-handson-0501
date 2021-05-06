<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shops')->insert([
            [
                'id'=>1,
                'shop_name'=>'食パン屋',
                'area_id'=>1
            ],
            [
                'id'=>2,
                'shop_name'=>'クロワッサン屋',
                'area_id'=>2
            ],
            [
                'id'=>3,
                'shop_name'=>'コッペパン屋',
                'area_id'=>3
            ]
        ]);
    }
}
