@extends('layouts.bootstrap1.app')

@php 
$columns = $category1=='pns'?['pns','nonpns']:['certificated','noncertificated'];
$cok = $category1=='pns'?['PNS','Non-PNS']:['Sertifikasi','Belum Sertifikasi'];
@endphp

@section('content')
<table class="table table-sm">
  <thead>
    <tr>
      <th scope="col">Jenjang</th>
      <th scope="col" class="text-center table-primary" >Total {{$cok[0]}}</th>
      <th scope="col" class="text-center table-secondary">Total {{$cok[1]}}</th>
    </tr>
  </thead>
  <tbody>
  @php 
    $t_ = $t_non = 0;
  @endphp
  @foreach($data as $key=>$val)
  <tr>
      <th scope="row">{{$key}}</th>
      <td class="text-center table-primary">{{$val[$columns[0]]}}</td>
      <td class="text-center table-secondary">{{$val[$columns[1]]}}</td>
    </tr>
    @php 
      $t_ += $val[$columns[0]];
      $t_non +=$val[$columns[1]];
    @endphp 
  @endforeach

  </tbody>
  <tfoot>
    <tr>
    <td width="300px">Jumlah keseluruhan</td>
    <th class="text-center">{{$t_}}</th>
    <th class="text-center">{{$t_non}}</th>
    </tr>
    <tr>
    <td width="300px">Jumlah yang belum isi data</td>
    <th class="text-center" colspan=2>{{$data2[0]->total}}</th>
    </tr>
  </tfoot>
</table>
@stop