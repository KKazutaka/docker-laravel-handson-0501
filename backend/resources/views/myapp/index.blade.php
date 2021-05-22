@extends('layouts.app')

@section('content')


<script src="{{ asset('chart.js/chart.js') }}"></script>

<div class="day_wrapper" style="">

    <div class="alert alert-warning col-6">
    <h3 class="text-center"><u>Compare 2day</u></h3>
    <div class="show_process_wrapper">
        <div class="show_process_week">
            <h5>Yesterday</h5>

        @foreach($yesterday_sum_taken_times as $habit_name => $taken_time)
            <p>{{$habit_name}} : {{$taken_time}} m</p>
        @endforeach
        </div>

        <div class="show_process_week">
            <h5>Today</h5>

        @foreach($today_sum_taken_times as $habit_name => $taken_time)
            <p>{{$habit_name}} : {{$taken_time}} m</p>
        @endforeach
        </div>
    </div>
    </div><!-- show_process_wrapper -->

    <div class="col-6">
        <canvas id="todayGraph"></canvas>
    </div>
</div> <!-- week_wrapper -->
<!-- class名を変えたい -->

<label for="toggle_week_month" style="width:100%;">
<!-- MEMO:width100%しないとサイズかわってしまう。なぜ？ -->
    <input type="checkbox" id="toggle_week_month">

    <div class="week_wrapper">

    <div class="alert alert-info col-6">
    <h3 class="text-center"><u>Compare week</u></h3>
        <div class="show_process_wrapper">

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
        </div>
        <div class="col-6">
            <canvas id="weekGraph"></canvas>
        </div>
    </div> <!-- week_wrapper -->


    <div class="month_wrapper">
        <div class="show_process_wrapper alert alert-success col-6">

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
    </div><!-- month_wrapper -->
    </input>
</label>

<script>
(function(){
  var ctx = document.getElementById("todayGraph");

  labelNames = '{!!$habits!!}'
  NumData = '{!!$compareToday!!}'

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
        data:[NumData.yesterday[ln] || 0,NumData.today[ln] || 0],
        backgroundColor:'rgba(75, 192, 192, 0.2)',
        borderColor:'rgba(75, 192, 192, 1)',
        borderWidth: 1
        })
  }


  var data = {
        labels: ["Yesterday","Today"],
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
    .day_wrapper,
    .week_wrapper{
        display:flex;
    }

    .month_wrapper{
        display:none;
    }

    input[type='checkbox']{
        display:none;
    }
    #toggle_week_month:hover{
        box-shadow: 0 15px 30px -5px rgba(0,0,0,.15), 0 0 5px rgba(0,0,0,.1);
        transform: translateY(-4px);
    }
    #toggle_week_month:checked ~ .month_wrapper{
        display:flex;
    }
    #toggle_week_month:checked + .week_wrapper{
        display:none;
    }

    .show_process_wrapper{
        display: flex;
        justify-content: space-around;
    }
</style>

@endsection
