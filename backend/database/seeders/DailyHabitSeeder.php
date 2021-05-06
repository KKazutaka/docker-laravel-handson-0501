<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DailyHabitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('daily_habits')->insert([
            [
                'habit_id'=>1,
                'taken_time'=>33,
                'done_at'=>"2020-04-05"
            ],[
                'habit_id'=>1,
                'taken_time'=>44,
                'done_at'=>"2020-04-05"
            ],[
                'habit_id'=>2,
                'taken_time'=>55,
                'done_at'=>"2020-04-05"
            ]
        ]);
    }
}
