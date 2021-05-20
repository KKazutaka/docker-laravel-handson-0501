fjadksj;<br>
@foreach($weekly_sum_taken_times as $weekly_sum_taken_time)
{{$weekly_sum_taken_time}} <br>
@endforeach

<!-- <script src="../../../node_modules/chart.js/dist/chart.js"></script> -->
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
