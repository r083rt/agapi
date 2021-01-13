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
    $t_pns = $t_nonpns = 0;
  @endphp
  @foreach($data as $key=>$val)
  <tr>
      <th scope="row">{{$key}}</th>
      <td class="text-center table-primary">{{$val['pns']}}</td>
      <td class="text-center table-secondary">{{$val['nonpns']}}</td>
    </tr>
    @php 
      $t_pns+=$val['pns'];
      $t_nonpns+=$val['nonpns'];
    @endphp 
  @endforeach

  </tbody>
  <tfoot>
    <td>Jumlah</td>
    <th class="text-center">{{$t_pns}}</th>
    <th class="text-center">{{$t_nonpns}}</th>
  </tfoot>
</table>
@stop