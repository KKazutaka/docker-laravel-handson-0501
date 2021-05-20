@extends('layouts.app')


@section('content')

<h3 class="headline">日々の行動時間登録</h3>

<?php foreach ($habits as $habit):?>
    <form method="POST" action="{{route('daily_habit.store')}}" >
    @csrf
        <h3><?=$habit->habits_name;?></h3>
        <h4>目標：<?=$habit->description;?></h4>
        <div class="input-group">
        時間<input type="text" class="form-control"  name="taken_time">
        内容<input type="text" class="form-control"  name="description">
        <input type="submit" name="btn_confirm" value="登録する">
        </div>
        <input type="hidden" name="habit_id" value="<?= $habit->id; ?>">
    </form>
<?php endforeach;?>


@endsection
