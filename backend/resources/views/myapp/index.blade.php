@extends('layouts.app')


@section('content')
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

<div class="show_process_wrapper alert alert-warning">

<div class="show_process_week">
        <h3>先週１週間の成果</h3>
        <p>期間：{{$lastWeekStart}}〜{{$lastWeekEnd}}</p>

    @foreach($weekly_sum_taken_times as $habit_name => $taken_time)
        <p>{{$habit_name}} : {{$taken_time}} m</p>
    @endforeach
    </div>

    <div class="show_process_week">
        <h3>This Week</h3>
        <p>{{$thisWeekStart}}〜{{$thisWeekEnd}}</p>

    @foreach($this_week_sum_taken_times as $habit_name => $taken_time)
        <p>{{$habit_name}} : {{$taken_time}} m</p>
    @endforeach
    </div>


    </div>

    <div class="show_process_wrapper alert alert-warning">

    <div class="show_process_month">
        <h3>先月の成果</h3>
        <p>期間：{{$lastMonthStart}}〜{{$lastMonthEnd}}</p>
    @foreach($month_sum_taken_times as $habit_name => $taken_time)
        <p>{{$habit_name}} : {{$taken_time}} m</p>
    @endforeach
    </div>

    <div class="show_process_month">
        <h3>This Month</h3>
        <p>{{$thisMonthStart}}〜{{$thisMonthEnd}}</p>
    @foreach($this_month_sum_taken_times as $habit_name => $taken_time)
        <p>{{$habit_name}} : {{$taken_time}} m</p>
    @endforeach
    </div>

</div>


<script src="{{ asset('chart.js/chart.js') }}"></script>


<canvas id="sample3"></canvas>
<script>


(function(){
  var ctx = document.getElementById("sample3");



  let labelNames = ["labelName1","labelName2","labelName3","labelName4"]
  let NumData = {
    "lastWeek":{
      "labelName1":110,
      "labelName2":120,
      "labelName4":104
    },
    "thisWeek":{
      "labelName1":210,
      "labelName2":220
    }
}

  let jsonDummyData = {}
  // for(let ln of labelNames) jsonDummyData[ln] = {lastWeek: NumData.lastWeek[ln] || 0, thisWeek: NumData.thisWeek[ln] || 0}
  for(let ln of labelNames) {
    jsonDummyData[ln] = {lastWeek: NumData.lastWeek[ln] || 0, thisWeek: NumData.thisWeek[ln] || 0}
  }


  // PHPから渡ってくるデータ例
  let labelInData = ["PHP","laravel","Golang","AWS"]
  let jsonData = {"lastWeek":{"laravel":121,"Golang":10,"AWS":260},"thisWeek":{"laravel":311}}


  // chart.jsが必要としてるdatasetsへ変換

//   labelNames = {{ $hogehabits }};
//   NumData = {{ $hogehoge }};

  labelNames = labelInData;
  NumData = jsonData;


  let datasets = []
  for(let ln of labelNames){
    datasets.push({label:ln,data:[NumData.lastWeek[ln] || 0,NumData.thisWeek[ln] || 0]})
  }


  var data = {
        labels: ["last_week","this_week"],
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
