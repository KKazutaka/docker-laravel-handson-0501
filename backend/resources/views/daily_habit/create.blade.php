<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


<?php foreach ($habits as $habit):?>
    <form method="POST" action="{{route('daily_habit.store')}}" >
    @csrf
        <h3><?=$habit->habits_name;?></h3>
        <h4>目標：<?=$habit->description;?></h4>
        時間<input type="text" name="taken_time">
        内容<input type="text" name="description">
        <input type="submit" name="btn_confirm" value="登録する">
        <input type="hidden" name="habit_id" value="<?= $habit->id; ?>">
    </form>
<?php endforeach;?>


</body>
</html>
