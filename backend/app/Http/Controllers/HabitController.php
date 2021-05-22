<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Habit;
use Illuminate\Support\Facades\DB;

class HabitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $habits = Habit::all();
        // dd($habits);
        return view('habit.index', \compact('habits'));
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
        $habit = new Habit;
        $habit->habits_name=$request->input('habits_name');
        $habit->description=$request->input('description');
        $habit->save();
        return redirect('myapp/habits/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $habit=Habit::find($id);
        return view('habit.show', compact('habit'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $habit=Habit::find($id);
        return view('habit.edit', compact('habit'));
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
        $habit = Habit::find($id);
        $habit->habits_name=$request->input('habits_name');
        $habit->description=$request->input('description');
        $habit->save();
        return redirect('myapp/habits/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $habit=Habit::find($id);
        $habit->delete();
        return \redirect('myapp/habits/index');
    }
}
