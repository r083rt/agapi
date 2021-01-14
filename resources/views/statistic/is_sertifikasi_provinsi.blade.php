@extends('layouts.pns-statuses.app2')

@section('content')
<div class="row">
<table class="table table-sm">
  <thead>
    <tr>
      <th scope="col" rowspan='2'>#</th>
      <th scope="col" rowspan='2'>Provinsi</th>
      <th scope="col" class="text-center table-primary" colspan='6'>Sudah Sertifikasi</th>
      <th scope="col" class="text-center table-secondary" colspan='6'>Belum Sertifikasi</th>
    </tr>
    <tr>
    <th scope="col" class="table-primary">SD</th>
    <th scope="col" class="table-primary">SMP</th>
    <th scope="col" class="table-primary">SMA</th>
    <th scope="col" class="table-primary">SMK</th>
    <th scope="col" class="table-primary">TK</th>
    <th scope="col" class="table-primary">SLB</th>
    <th scope="col" class="table-secondary">SD</th>
    <th scope="col" class="table-secondary">SMP</th>
    <th scope="col" class="table-secondary">SMA</th>
    <th scope="col" class="table-secondary">SMK</th>
    <th scope="col" class="table-secondary">TK</th>
    <th scope="col" class="table-secondary">SLB</th>
    </tr>
  </thead>
  <tbody>
  @php 
    $i=1;
  @endphp 
  @foreach($data as $key=>$val)
  <tr>
      <th scope="row">{{$i++}}</th>
      <td>{{$key}}</td>
      <td class="table-primary">{{$val['certificated']['SD']}}</td>
      <td class="table-primary">{{$val['certificated']['SMP']}}</td>
      <td class="table-primary">{{$val['certificated']['SMA']}}</td>
      <td class="table-primary">{{$val['certificated']['SMK']}}</td>
      <td class="table-primary">{{$val['certificated']['TK']}}</td>
      <td class="table-primary">{{$val['certificated']['SLB']}}</td>
        <td class="table-secondary">{{$val['noncertificated']['SD']}}</td>
      <td class="table-secondary">{{$val['noncertificated']['SMP']}}</td>
      <td class="table-secondary">{{$val['noncertificated']['SMA']}}</td>
      <td class="table-secondary">{{$val['noncertificated']['SMK']}}</td>
      <td class="table-secondary">{{$val['noncertificated']['TK']}}</td>
      <td class="table-secondary">{{$val['noncertificated']['SLB']}}</td>
    </tr>
  @endforeach

  </tbody>
</table>
</div><!--end row-->
<!-- <div class="row">
  <div class='col-sm-12'>
  <canvas id="myChart" ></canvas>

  </div>

</div>
<div class="row">
  <div class='col-sm-12'>
  <canvas id="myChart2" ></canvas>

  </div>

</div> -->
<!--end row-->
@stop

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" integrity="sha512-d9xgZrVZpmmQlfonhQUvTR7lMPtO7NkZMkA0ABN3PHCbKA5nqylQ/yWlFAyY6hYgdF1Qh6nYiuADWwKB4C2WSw==" crossorigin="anonymous"></script>
<script>
var labels=@json(array_keys($data));
var data=@json($data);

var datasets=[];
var datasets2=[];
var jenjang = ['SD','SMP','SMA','SMK','TK','SLB'];
var bgColors = [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ];
var borderColors = [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ];
jenjang.forEach((v,k)=>{
  const obj={
          label: v,
          backgroundColor:  bgColors[k],
          borderColor: borderColors[k],
          borderWidth: 1,
          data: []
        }
  datasets.push({...obj,data:[]})
  datasets2.push({...obj,data:[]})
  
});
const province_indexs=Object.keys(data)
province_indexs.forEach(v=>{
  const jenjang_ = Object.keys(data[v].pns);
  jenjang_.forEach(v2=>{
    const index = datasets.findIndex(e=>e.label==v2);
    datasets[index].data.push(data[v].pns[v2])
    datasets2[index].data.push(data[v].nonpns[v2])
  })
  // datasets.SD.push(data[v].pns.)
})

// console.log(datasets)
// var horizontalBarChartData = {
// 			labels: labels,
// 			datasets: [{
// 				label: 'SD',
// 				backgroundColor:  'rgba(255, 99, 132, 0.2)',
// 				borderColor:'rgba(255, 99, 132, 1)',
// 				borderWidth: 1,
// 				data: [
// 					randomScalingFactor(),
// 					randomScalingFactor(),
// 					randomScalingFactor(),
// 					randomScalingFactor(),
// 					randomScalingFactor(),
// 					randomScalingFactor(),
// 					randomScalingFactor()
// 				]
//       }
//     ]

//     };
    
window.onload = function(){
  var ctx = document.getElementById('myChart');
  var myChart = new Chart(ctx, {
      type: 'horizontalBar',
      data: {
          labels: labels,
          datasets: datasets
      },
      options: {
        title: {
						display: true,
						text: 'Pemetaan Guru PNS'
				},
        scales: {
						xAxes: [{
							stacked: true,
						}],
						yAxes: [{
							stacked: true
						}]
					}
      }
  });

  ///
  var ctx2 = document.getElementById('myChart2');
  var myChart2 = new Chart(ctx2, {
      type: 'horizontalBar',
      data: {
          labels: labels,
          datasets: datasets2
      },
      options: {
        title: {
						display: true,
						text: 'Pemetaan Guru Non-PNS'
				},
        scales: {
						xAxes: [{
							stacked: true,
						}],
						yAxes: [{
							stacked: true
						}]
					}
      }
  });
}
</script>
@stop