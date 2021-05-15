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
                'done_at'=>"2021-05-06"
            ],[
                'habit_id'=>1,
                'taken_time'=>44,
                'done_at'=>"2021-05-06"
            ],[
                'habit_id'=>1,
                'taken_time'=>40,
                'done_at'=>"2021-05-07"
            ],[
                'habit_id'=>2,
                'taken_time'=>10,
                'done_at'=>"2021-05-06"
            ],[
                'habit_id'=>2,
                'taken_time'=>77,
                'done_at'=>"2021-05-07"
            ],[
                'habit_id'=>3,
                'taken_time'=>55,
                'done_at'=>"2021-05-07"
            ]
            ]);
    }
}
