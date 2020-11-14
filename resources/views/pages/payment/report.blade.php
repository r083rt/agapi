@extends('layouts.app')

@section('content')
	<div class="container-fluid" id="app">
        <payment-report></payment-report>
        <payment-report-ardata></payment-report-ardata>
        <payment-report-dpp></payment-report-dpp>
        <payment-report-province></payment-report-province>
        <payment-report-city></payment-report-city>
	</div>
@stop

@section('javascript')
<script src="{{mix('js/app.js')}}"></script>
@stop
