@extends('layout.user_main')

@section('contents')
	<div class="panel panel-primary">
		<div class="panel-heading"><h1> Edit User {{ $user->username }} </h1></div>
			<div class="panel-body">
			{{ Form::model($user, array('route' => array('user.update', $user->id), 'method' => 'PUT')) }}
			<div class="row">
		  		<div class="col-lg-12">
		  			<div class="form-group">
		                <label class="col-md-4 control-label">Username: </label>
		                <div class="col-md-6">
		              		{{ Form::text('username') }}
		              		<br>
							{{ $errors->first('username') }}
		                </div>
		            </div>
					<br>
					<div class="form-group">
		                <label class="col-md-4 control-label">Password: </label>
		                <div class="col-md-6">
		               		{{ Form::password('password') }}
		               		<br>	
							{{ $errors->first('password') }}
		                </div>
		            </div>
					<br>
					<div class="form-group">
		                <label class="col-md-4 control-label">Confirm Password: </label>
		                <div class="col-md-6">
		               		{{ Form::password('password_confirmation') }}	
		               		<br>
							{{ $errors->first('password_confirmation') }}
		                </div>
		            </div>
					<br>
					<div class="form-group">
		                <label class="col-md-4 control-label">Email: </label>
		                <div class="col-md-6">
		               		{{ Form::email('email') }}	
		               		<br>
							{{ $errors->first('email') }}
		                </div>
		            </div>
					<br>
					<div class="form-group">
		                <label class="col-md-4 control-label">Contact: </label>
		                <div class="col-md-6">
		               		{{ Form::text('contact') }}	
		               		<br>
							{{ $errors->first('contact') }}
		                </div>
		            </div>
					<br>
					<div class="form-group">
		                <div class="col-md-6 col-md-offset-4">
							{{ Form::submit(('Edit'),  array('class' => 'btn btn-primary')) }}
						</div>
					</div>
				</div>
			</div>
			{{ Form::close() }}
		</div>
	</div>

	
	
@stop