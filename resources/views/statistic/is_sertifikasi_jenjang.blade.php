@extends('layouts.pns-statuses.app')

@section('content')
<table class="table table-sm">
  <thead>
    <tr>
      <th scope="col">Jenjang</th>
      <th scope="col" class="text-center table-primary" >Total PNS</th>
      <th scope="col" class="text-center table-secondary">Total Non-PNS</th>
    </tr>
  </thead>
  <tbody>
  @php 
    $t_certificated = $t_noncertificated = 0;
  @endphp
  @foreach($data as $key=>$val)
  <tr>
      <th scope="row">{{$key}}</th>
      <td class="text-center table-primary">{{$val['certificated']}}</td>
      <td class="text-center table-secondary">{{$val['noncertificated']}}</td>
    </tr>
    @php 
      $t_certificated+=$val['certificated'];
      $t_noncertificated+=$val['noncertificated'];
    @endphp 
  @endforeach

  </tbody>
  <tfoot>
    <td>Jumlah</td>
    <th class="text-center">{{$t_certificated}}</th>
    <th class="text-center">{{$t_noncertificated}}</th>
  </tfoot>
</table>
@stop