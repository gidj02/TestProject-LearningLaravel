@extends('layout.user_main')

@section('contents')
	<div class="panel panel-primary">
		<div class="panel-heading"><h1> Hi {{ Auth::user()->username }}! </h1></div>
		<div class="panel-body">
			Welcome to the sample user maintenance.
		</div>
	</div>

	
	
@stop