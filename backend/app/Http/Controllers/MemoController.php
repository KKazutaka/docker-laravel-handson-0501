<?php

namespace App\Http\Controllers;

use App\Models\Memo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MemoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $memos = Memo::all();
        return view('memo.index', compact('memos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('memo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $memo = new Memo;
        $memo->title = $request->input('title');
        $memo->description = $request->input('description');
        $memo->save();
        return redirect('myapp/memo');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Memo  $memo
     * @return \Illuminate\Http\Response
     */
    public function show(Memo $memo, $id)
    {
        $memo = Memo::find($id);
        return view('memo.show', compact('memo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Memo  $memo
     * @return \Illuminate\Http\Response
     */
    public function edit(Memo $memo, $id)
    {
        $memo = Memo::find($id);
        return view('memo.edit', compact('memo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Memo  $memo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Memo $memo, $id)
    {
        $memo = Memo::find($id);
        $memo->title = $request->input('title');
        $memo->description = $request->input('description');
        $memo->save();
        return redirect('myapp/memo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Memo  $memo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Memo $memo, $id)
    {
        $memo = Memo::find($id);
        $memo->delete();
        return redirect('myapp/memo');
    }
}
