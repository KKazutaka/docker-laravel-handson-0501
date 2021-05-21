@extends('layouts.app')

@section('content')
<script src="{{ asset('chart.js/chart.js') }}"></script>


<div class="headline">
    <h1 >Show yourself</h1>
</div>


<div class="button_wrapper">
    <!-- create/store -->
    <button class="register_today btn btn-warning">
        <a href="{{route('daily_habit.create')}}">Register today</a>
    </button>

    <!-- show -->
    <button class="show_record btn btn-success">
        <a href="{{route('daily_habit.index')}}">Show Record</a>
    </button>

    <!-- create/store -->
    <button class="register_habit btn btn-dark">
        <a href="{{route('habit.index')}}">Register Habit</a>
    </button>
</div>

<div class="week_wrapper" style="">
    <div class="show_process_wrapper alert alert-warning col-6">

        <div class="show_process_week">
            <h3>Last Week</h3>
            <p>{{$lastWeekStart}}〜<br>{{$lastWeekEnd}}</p>

        @foreach($weekly_sum_taken_times as $habit_name => $taken_time)
            <p>{{$habit_name}} : {{$taken_time}} m</p>
        @endforeach
        </div>

        <div class="show_process_week">
            <h3>This Week</h3>
            <p>{{$thisWeekStart}}〜<br>{{$thisWeekEnd}}</p>

        @foreach($this_week_sum_taken_times as $habit_name => $taken_time)
            <p>{{$habit_name}} : {{$taken_time}} m</p>
        @endforeach
        </div>

    </div><!-- show_process_wrapper -->
    <div class="col-6">
        <canvas id="weekGraph"></canvas>
    </div>
</div> <!-- week_wrapper -->

<div class="month_wrapper">
    <div class="show_process_wrapper alert alert-warning col-6">

    <div class="show_process_month">
        <h3>Last Month</h3>
        <p>{{$lastMonthStart}}〜<br>{{$lastMonthEnd}}</p>
    @foreach($month_sum_taken_times as $habit_name => $taken_time)
        <p>{{$habit_name}} : {{$taken_time}} m</p>
    @endforeach
    </div>

    <div class="show_process_month">
        <h3>This Month</h3>
        <p>{{$thisMonthStart}}〜<br>{{$thisMonthEnd}}</p>
    @foreach($this_month_sum_taken_times as $habit_name => $taken_time)
        <p>{{$habit_name}} : {{$taken_time}} m</p>
    @endforeach
    </div>

</div>
    <div class="col-6">
        <canvas id="monthGraph"></canvas>
    </div>
</div>

<script>
(function(){
  var ctx = document.getElementById("weekGraph");

  labelNames = '{!!$habits!!}'
  NumData = '{!!$compareWeek!!}'

  labelNames = JSON.parse(labelNames);
  NumData = JSON.parse(NumData);

  let backgroundColor = [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)'
            ]

  let datasets = []
  for(let ln of labelNames){
    datasets.push({
        label:ln,
        data:[NumData.lastWeek[ln] || 0,NumData.thisWeek[ln] || 0],
        backgroundColor:'rgba(75, 192, 192, 0.2)',
        borderColor:'rgba(75, 192, 192, 1)',
        borderWidth: 1
        })
  }


  var data = {
        labels: ["Last week","This week"],
        datasets:datasets
    };

    var options = {};
    var ex_chart = new Chart(ctx, {
        type: 'bar', //折れ線グラフ
        data: data, //上記設定のデータ
        options: options
    });
}());

(function(){
  var ctx = document.getElementById("monthGraph");

  labelNames = '{!!$habits!!}'
  NumData = '{!!$compareMonth!!}'

  labelNames = JSON.parse(labelNames);
  NumData = JSON.parse(NumData);

  let datasets = []
  for(let ln of labelNames){
    datasets.push({label:ln,data:[NumData.lastMonth[ln] || 0,NumData.thisMonth[ln] || 0]})
  }


  var data = {
        labels: ["Last month","This month"],
        datasets:datasets
    };

    var options = {};
    var ex_chart = new Chart(ctx, {
        type: 'bar', //折れ線グラフ
        data: data, //上記設定のデータ
        options: options
    });
}());
</script>






<style>

    .week_wrapper,
    .month_wrapper{
        display:flex;
    }
    .show_process_wrapper{
        display: flex;
        justify-content: space-around;
    }
    .button_wrapper{
        /* margin-top: 50px; */
        margin: 20px 0;
        display: flex;
        justify-content: space-around;

    }
</style>

@endsection
