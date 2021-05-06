<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HabitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('habits')->insert([
            [
                'habits_name'=>'筋トレ1',
                'description'=>'アブローラー100回'
            ],[
                'habits_name'=>'筋トレ2',
                'description'=>'ドラゴンフラッグ10回'
            ]
        ]);
    }
}
