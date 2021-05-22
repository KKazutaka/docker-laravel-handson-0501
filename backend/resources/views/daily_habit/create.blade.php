@extends('layouts.app')

@section('content')

@foreach ($show_daily_habits as $show_daily_habit)
<form method="POST" action="{{route('daily_habit.store')}}" >
    @csrf
        <h3>Category : {{ $show_daily_habit["habits_name"] }}</h3>
        <p>Description : {{ $show_daily_habit["description"] }}</p>
        <p>Total：{{ $show_daily_habit["taken_time"] }}</p>
        <div class="input-group">
        Mount<input type="text" class="form-control"  name="taken_time">
        Memo<input type="text" class="form-control"  name="description">
        <input type="submit" name="btn_confirm" value="登録">
        </div>
        <input type="hidden" name="habit_id" value="{{ $show_daily_habit['habit_id'] }}">
    </form>

@endforeach


@endsection
