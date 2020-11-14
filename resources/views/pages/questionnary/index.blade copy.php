@extends('layouts.app')

@section('content')
	<div class="container-fluid" id="app">
        <questionnary-component :educational-levels="{{$educational_levels}}"></questionnary-component>
	</div>
@stop

@section('javascript')
<script src="{{mix('js/app.js')}}"></script>
@stop
