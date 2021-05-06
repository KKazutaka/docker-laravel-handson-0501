<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

更新画面
<form method="POST" action="{{route('habit.update',['id'=>$habit->id])}}">
@csrf
行動
<input type="text" name="habits_name" value="{{ $habit->habits_name}}">
目標
<input type="text" name="description" value="{{$habit->description}}">
<input class="btn btn-info" type="submit" value="更新する">
</form>

</body>
</html>
