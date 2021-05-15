<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Habit;
use App\Models\DailyHabit;
use Illuminate\Support\Facades\DB;

class MyappController extends Controller
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
                ->join('habits', 'daily_habits.habit_id', '=', 'habits.id')
                ->where('done_at', '>=', $lastWeekStart)
                ->where('done_at', '<=', $lastWeekEnd)
                ->get()
                ->toArray();

        $weekly_sum_taken_times = [];
        foreach ($lastWeekDailyHabits as $lastWeekDailyHabit) {
            $habit_id = $lastWeekDailyHabit->habit_id;
            $habit_name = $lastWeekDailyHabit->habits_name;
            $taken_time = $lastWeekDailyHabit->taken_time;

            if (!isset($weekly_sum_taken_times[$habit_name])) {
                // ＊＊＊支倉未起隆＊＊＊
                $weekly_sum_taken_times += [$habit_name];
                $weekly_sum_taken_times[$habit_name] = $taken_time;
            } else {
                $weekly_sum_taken_times[$habit_name]+=$taken_time;
            }
        }

        //  $weekly_sum_taken_timesを空で用意してるのに、＊＊＊支倉未起隆＊＊＊の行で、先頭に[0=>hoge]がはいる。その対策として下記行を追加
        array_shift($weekly_sum_taken_times);


        //先週の初めと終わりの日にちをとってくる。
        $lastMonth = Carbon::parse('last month');
        $lastMonthStart = $lastMonth->startOfMonth()->format('Y-m-d');
        $lastMonthEnd = $lastMonth->endOfMonth()->format('Y-m-d');

        // DailyHabitsから該当する内容をとってくる。
        $lastMonthDailyHabits=DB::table('daily_habits')
                        ->join('habits', 'daily_habits.habit_id', '=', 'habits.id')
                        ->where('done_at', '>=', $lastMonthStart)
                        ->where('done_at', '<=', $lastMonthEnd)
                        ->get()
                        ->toArray();

        $month_sum_taken_times = [];
        foreach ($lastMonthDailyHabits as $lastMonthDailyHabit) {
            $habit_id = $lastMonthDailyHabit->habit_id;
            $habit_name = $lastMonthDailyHabit->habits_name;
            $taken_time = $lastMonthDailyHabit->taken_time;

            if (!isset($month_sum_taken_times[$habit_name])) {
                // ＊＊＊支倉未起隆＊＊＊
                $month_sum_taken_times += [$habit_name];
                $month_sum_taken_times[$habit_name] = $taken_time;
            } else {
                $month_sum_taken_times[$habit_name]+=$taken_time;
            }
        }
        //  $weekly_sum_taken_timesを空で用意してるのに、＊＊＊支倉未起隆＊＊＊の行で、先頭に[0=>hoge]がはいる。その対策として下記行を追加
        array_shift($month_sum_taken_times);


        //今週の初めと終わりの日にちをとってくる。
        $thisWeek = Carbon::parse('this week');
        $thisWeekStart = $thisWeek->startOfWeek()->format('Y-m-d');
        $thisWeekEnd = $thisWeek->endOfWeek()->format('Y-m-d');

        // DailyHabitsから該当する内容をとってくる。
        $thisWeekDailyHabits=DB::table('daily_habits')
                        ->join('habits', 'daily_habits.habit_id', '=', 'habits.id')
                        ->where('done_at', '>=', $thisWeekStart)
                        ->where('done_at', '<=', $thisWeekEnd)
                        ->get()
                        ->toArray();

        $this_week_sum_taken_times = [];
        foreach ($thisWeekDailyHabits as $thisWeekDailyHabit) {
            $habit_id = $thisWeekDailyHabit->habit_id;
            $habit_name = $thisWeekDailyHabit->habits_name;
            $taken_time = $thisWeekDailyHabit->taken_time;

            if (!isset($this_week_sum_taken_times[$habit_name])) {
                // ＊＊＊支倉未起隆＊＊＊
                $this_week_sum_taken_times += [$habit_name];
                $this_week_sum_taken_times[$habit_name] = $taken_time;
            } else {
                $this_week_sum_taken_times[$habit_name]+=$taken_time;
            }
        }

        //  $weekly_sum_taken_timesを空で用意してるのに、＊＊＊支倉未起隆＊＊＊の行で、先頭に[0=>hoge]がはいる。その対策として下記行を追加
        array_shift($this_week_sum_taken_times);

        //今週の初めと終わりの日にちをとってくる。
        $thisMonth = Carbon::parse('this month');
        $thisMonthStart = $thisMonth->startOfMonth()->format('Y-m-d');
        $thisMonthEnd = $thisMonth->endOfMonth()->format('Y-m-d');

        // DailyHabitsから該当する内容をとってくる。
        $thisMonthDailyHabits=DB::table('daily_habits')
                        ->join('habits', 'daily_habits.habit_id', '=', 'habits.id')
                        ->where('done_at', '>=', $thisMonthStart)
                        ->where('done_at', '<=', $thisMonthEnd)
                        ->get()
                        ->toArray();

        $this_month_sum_taken_times = [];
        foreach ($thisMonthDailyHabits as $thisMonthDailyHabit) {
            $habit_id = $thisMonthDailyHabit->habit_id;
            $habit_name = $thisMonthDailyHabit->habits_name;
            $taken_time = $thisMonthDailyHabit->taken_time;

            if (!isset($this_month_sum_taken_times[$habit_name])) {
                // ＊＊＊支倉未起隆＊＊＊
                $this_month_sum_taken_times += [$habit_name];
                $this_month_sum_taken_times[$habit_name] = $taken_time;
            } else {
                $this_month_sum_taken_times[$habit_name]+=$taken_time;
            }
        }

        //  $monthly_sum_taken_timesを空で用意してるのに、＊＊＊支倉未起隆＊＊＊の行で、先頭に[0=>hoge]がはいる。その対策として下記行を追加
        array_shift($this_month_sum_taken_times);



        return view('myapp.index', \compact('weekly_sum_taken_times', 'lastWeekStart', 'lastWeekEnd', 'month_sum_taken_times', 'lastMonthStart', 'lastMonthEnd', 'this_week_sum_taken_times', 'thisWeekStart', 'thisWeekEnd', 'this_month_sum_taken_times', 'thisMonthStart', 'thisMonthEnd'));
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
