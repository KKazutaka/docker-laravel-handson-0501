<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Habit;
use App\Models\DailyHabit;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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
        $habits = DB::table('habits')
                ->get();
        // ->toArray();

        $today = Carbon::today()->format('Y-m-d');
        $daily_habits=DB::table('daily_habits')
        ->join('habits', 'daily_habits.habit_id', '=', 'habits.id')
        ->select('habit_id', 'habits_name', DB::raw('sum(taken_time) as taken_time'))
        ->where('done_at', '=', $today)
        ->groupBy('habit_id')
        ->get()
        ->toArray();

        $show_daily_habits=[];

        foreach ($habits as $habit) {
            $habit_id = $habit->id;
            $habits_name = $habit->habits_name;
            $description = $habit->description;

            $key = array_search($habit->id, array_column($daily_habits, 'habit_id'));

            if ($key||$key===0) {
                $taken_time =$daily_habits[$key]->taken_time;
            } else {
                $taken_time =0;
                // 解決してない！！！
                // $daily_habits[0]のtaken_timeをとってくることができないのはなぜか
                // if ($key===0)という書き方が謎です。
            }
            // array_push($show_daily_habits, [$habits_name,$description,$taken_time]);
            array_push($show_daily_habits, ["habit_id"=>$habit_id, "habits_name"=>$habits_name,"description"=>$description,"taken_time"=>$taken_time]);
            echo "<br>";
        }
        // dd($habits, $daily_habits, $show_daily_habits, $daily_habits[0]);

        return view('daily_habit.create', compact('habits', 'daily_habits', 'show_daily_habits'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $daily_habits = new DailyHabit;
        $daily_habits->habit_id=$request->input('habit_id');
        $daily_habits->taken_time=$request->input('taken_time');
        $daily_habits->description=$request->input('description');
        $daily_habits->done_at=date("Y-m-d");
        $daily_habits->save();
        return redirect('myapp/daily_habits/create');
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
