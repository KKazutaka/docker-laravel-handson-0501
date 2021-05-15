<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Habit;
use App\Models\DailyHabit;
use Illuminate\Support\Facades\DB;

class DailyHabitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $habits = DB::table('habits')->get();

        // Y-mが一致するものだけ、という処理があとから必要そう
        $daily_habits=DB::table('daily_habits')
        ->get()
        ->toArray();

        $daily_sum_taken_time = [];
        foreach ($daily_habits as $daily_habit) {
            $done_at = $daily_habit->done_at;
            $habit_id = $daily_habit->habit_id;
            $taken_time = $daily_habit->taken_time;

            // done_at=>habit_idが存在しないなら$taken_timeをそのまま代入
            if (!isset($daily_sum_taken_time[$done_at][$habit_id])) {
                $daily_sum_taken_time += [$done_at=>[$habit_id]];
                $daily_sum_taken_time[$done_at][$habit_id]=$taken_time;
            } else {
                // if文だと、２回回ってしまうから、else文に戻した
                $daily_sum_taken_time[$done_at][$habit_id]+=$taken_time;
            }
        }
        // dd($daily_habits, $daily_sum_taken_time);


        // ↓はダミーデータ。これになるよう、SQLでDBからデータとってくる。
        // 'done_at'=>array(int habit_id=>int sum(taken_time), habit_id=>sum(taken_time)....),
        // $aks =[
        //     '2021-05-05' => [1 => 30, 0 => 40],
        //     '2021-05-06' => [1 => 120, 2 => 50],
        //     '2021-05-07' => [1 => 44, 2 => 55]
        // ];


        return view('daily_habit.index', \compact('habits', 'daily_sum_taken_time'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $habits = DB::table('habits')->get();
        return view('daily_habit.create', compact('habits'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd(date());
        $daily_habits = new DailyHabit;
        $daily_habits->habit_id=$request->input('habit_id');
        $daily_habits->taken_time=$request->input('taken_time');
        $daily_habits->description=$request->input('description');
        $daily_habits->done_at=date("Y-m-d");
        $daily_habits->save();
        return redirect('myapp');
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
