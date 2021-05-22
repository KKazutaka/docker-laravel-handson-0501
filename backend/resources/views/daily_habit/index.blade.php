@extends('layouts.app')

@section('content')

<?php
    $now_year = date("Y");
    $now_month = date("n");
    $now_day = date("j");
    $countdate=date("t");
    $weekday = array("日","月","火","水","木","金","土");
?>


<h3> This Month( <?=$now_year?>.<?=$now_month?> ) Progress</h3>


 <table class="table table-bordered">
<tr>
<th>日付</th>
@foreach($habits as $habit)
<th style="min-width:100px; text-align:center;"><a href="{{route('habit.edit',['id'=>$habit->id])}}"> {{$habit->habits_name}}</a> </th>
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
    echo "円 ";
    // echo round(intval($daily_sum_taken_time[date("Y-m-$day")][$habit->id]) / 60, 2);
    // echo "h)";
}
?>

</td>
@endforeach
</tr>

<?php endfor;?>

</table>

@endsection
