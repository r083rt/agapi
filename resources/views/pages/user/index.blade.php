@extends('layouts.app')

@section('content')
	<div class="container-fluid" id="app">
        <user-component></user-component>
	</div>
@stop

@section('javascript')
<script src="{{mix('js/app.js')}}"></script>
@stop
