<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\DailyHabit;
use Illuminate\Support\Facades\DB;

class PGController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //先週の初めと終わりの日にちをとってくる。
        $lastWeek = Carbon::parse('last week');
        $lastWeekStart = $lastWeek->startOfWeek()->format('Y-m-d');
        $lastWeekEnd = $lastWeek->endOfWeek()->format('Y-m-d');

        // DailyHabitsから該当する内容をとってくる。
        $lastWeekDailyHabits=DB::table('daily_habits')
        ->where('done_at', '>=', $lastWeekStart)
        ->where('done_at', '<=', $lastWeekEnd)
        ->get()
        ->toArray();
        // dd($lastWeekDailyHabits);

        $weekly_sum_taken_times = [];
        foreach ($lastWeekDailyHabits as $lastWeekDailyHabit) {
            $done_at = $lastWeekDailyHabit->done_at;
            $habit_id = $lastWeekDailyHabit->habit_id;
            $taken_time = $lastWeekDailyHabit->taken_time;

            if (!isset($weekly_sum_taken_times[$habit_id])) {
                $weekly_sum_taken_times += [$habit_id];
                $weekly_sum_taken_times[$habit_id]=$taken_time;
            } else {
                $weekly_sum_taken_times[$habit_id]+=$taken_time;
            }
        }
        // dd($weekly_sum_taken_times);



        return view('pg.index', \compact('weekly_sum_taken_times'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
