@extends('layouts.app')

@section('content')


<!-- 自信がないので、以前のコードをのこしておく -->
<!-- @foreach ($habits as $habit)
    <form method="POST" action="{{route('daily_habit.store')}}" >
    @csrf
        <h3>Action : <?=$habit->habits_name;?></h3>
        <p>Target : <?=$habit->description;?></p>
        <div class="input-group">
        時間<input type="text" class="form-control"  name="taken_time">
        内容<input type="text" class="form-control"  name="description">
        <input type="submit" name="btn_confirm" value="登録">
        </div>
        <input type="hidden" name="habit_id" value="<?= $habit->id; ?>">
    </form>
@endforeach -->


@foreach ($show_daily_habits as $show_daily_habit)
<form method="POST" action="{{route('daily_habit.store')}}" >
    @csrf
        <h3>Action : {{ $show_daily_habit["habits_name"] }}</h3>
        <p>Target : {{ $show_daily_habit["description"] }}</p>
        <p>時間：{{ $show_daily_habit["taken_time"] }}</p>
        <div class="input-group">
        時間<input type="text" class="form-control"  name="taken_time">
        内容<input type="text" class="form-control"  name="description">
        <input type="submit" name="btn_confirm" value="登録">
        </div>
        <input type="hidden" name="habit_id" value="{{ $show_daily_habit['habit_id'] }}">
    </form>

@endforeach


@endsection
