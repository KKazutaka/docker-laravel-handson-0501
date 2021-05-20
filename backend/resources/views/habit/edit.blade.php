@extends('layouts.app')


@section('content')

<h3 class="heading">
更新画面
</h3>
<form method="POST" action="{{route('habit.update',['id'=>$habit->id])}}">
@csrf
<div class="input-group">
行動
<input type="text" class="form-control"  name="habits_name" value="{{ $habit->habits_name}}">
目標
<input type="text" class="form-control"  name="description" value="{{$habit->description}}">
</div>
<input class="btn btn-info" type="submit" value="更新する">
</form>

@endsection
