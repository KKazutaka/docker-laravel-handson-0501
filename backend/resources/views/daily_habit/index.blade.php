<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
    $now_year = date("Y");
    $now_month = date("n");
    $now_day = date("j");
    $countdate=date("t");
    $weekday = array("日","月","火","水","木","金","土");
?>

<h2><?=$now_year?>年<?=$now_month?>月の進捗</h2>


 <table border=1>
<tr>
<th>日付</th>
@foreach($habits as $habit)
<th style="min-width:100px;"><a href="{{route('habit.edit',['id'=>$habit->id])}}"> {{$habit->habits_name}}</a> </th>
@endforeach
</tr>

<?php for ($day=1;$day<=$countdate; $day++):?>

<?php
// 曜日を決めるための$wの定義。関数化したい
$w = date("w", mktime(0, 0, 0, $now_month, $day, $now_year));
switch ($w) {
case 0: //日曜日の文字色
    $style = "color:#C30;";
    break;
case 6: //土曜日の文字色
    $style = "color:#03C;";
    break;
default: //月～金曜日の文字色
    $style = "color:#333;";
}
if ($day == $now_day) {
    $style = $style." background:silver;";
} ?>


<tr>
<td><div style="<?=$style?>"><?=$day?>日(<?=$weekday[$w]?>)</div></td>

<?php
if (strlen($day)==1) {
    $day = "0".strval($day);
};
?>

@foreach($habits as $habit)
<td style="<?=$style?> text-align:center;">

<?php
// ダミーデータarray $aks はあとで変更させる。
if (!empty($daily_sum_taken_time[date("Y-m-$day")][$habit->id])) {
    echo $daily_sum_taken_time[date("Y-m-$day")][$habit->id];
    echo "m (";
    echo round(intval($daily_sum_taken_time[date("Y-m-$day")][$habit->id]) / 60, 2);
    echo "h)";
}
?>

</td>
@endforeach
</tr>

<?php endfor;?>

</table>

<body>
</html>
