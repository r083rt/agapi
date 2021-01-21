@extends('layouts.bootstrap1.app')

@php 
  $text_arr = ['PNS','Non-PNS'];
  $value_arr = ['pns','nonpns'];
  if($category1=='sertifikasi'){
    $text_arr = ['Sertifikasi','Belum Sertifikasi'];
    $value_arr = ['certificated','noncertificated'];
  }
  
@endphp 

@section('content')
<div class="row">
<table class="table table-sm">
  <thead>
    <tr>
      <th scope="col" rowspan='2'>#</th>
      <th scope="col" rowspan='2'>Provinsi</th>
      <th scope="col" class="text-center table-primary" colspan='6'>{{$text_arr[0]}}</th>
      <th scope="col" class="text-center table-secondary" colspan='6'>{{$text_arr[1]}}</th>
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
      <td class="table-primary">{{$val[$value_arr[0]]['SD']}}</td>
      <td class="table-primary">{{$val[$value_arr[0]]['SMP']}}</td>
      <td class="table-primary">{{$val[$value_arr[0]]['SMA']}}</td>
      <td class="table-primary">{{$val[$value_arr[0]]['SMK']}}</td>
      <td class="table-primary">{{$val[$value_arr[0]]['TK']}}</td>
      <td class="table-primary">{{$val[$value_arr[0]]['SLB']}}</td>
        <td class="table-secondary">{{$val[$value_arr[1]]['SD']}}</td>
      <td class="table-secondary">{{$val[$value_arr[1]]['SMP']}}</td>
      <td class="table-secondary">{{$val[$value_arr[1]]['SMA']}}</td>
      <td class="table-secondary">{{$val[$value_arr[1]]['SMK']}}</td>
      <td class="table-secondary">{{$val[$value_arr[1]]['TK']}}</td>
      <td class="table-secondary">{{$val[$value_arr[1]]['SLB']}}</td>
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