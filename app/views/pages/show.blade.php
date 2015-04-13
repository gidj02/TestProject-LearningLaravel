@extends('layout.user_main')

@section('contents')
	<div class="panel panel-primary">
		<!-- Default panel contents -->
		<div class="panel-heading"><h1>Users' List</h1></div>
		<!-- Table -->

		<table class="table">
			<th>
				<td><h4>User ID</h4></td>
				<td><h4>Username</h4></td>
				<td><h4>Email</h4></td>
				<td><h4>Contact Number</h4></td>
				<td><h4>Actions</h4></td>
			</th>
			@foreach($user as $users)
			<tr>

				<td></td>
				<td>{{ $users->id }}</td>
				<td>{{ $users->username }}</td>
				<td>{{ $users->email }}</td>
				<td>{{ $users->contact }}</td>

                <td><a class="btn btn-small btn-info" href=" 								">Edit</a></td>
			    {{ Form::open(array('url' => 'user/' . $users->id, 'class' => 'pull-right')) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    <td>{{ Form::submit('Delete', array('class' => 'btn btn-warning')) }}</td>
                {{ Form::close() }}
			</tr>
			@endforeach
		</table>
	</div>
@stop
