@extends('layout.user_main')

@section('contents')

<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading"><h1>This is your Profile</h1></div>

  <!-- List group -->
  <ul class="list-group">
    <li class="list-group-item"><h4>User ID: </h4>{{ $user->id }}</li>
    <li class="list-group-item"><h4>Username: </h4>{{ $user->username }}</li>
    <li class="list-group-item"><h4>Password: </h4>{{ $user->password }}</li>
    <li class="list-group-item"><h4>Email: </h4>{{ $user->email }}</li>
    <li class="list-group-item"><h4>Contact: </h4>{{ $user->contact }}</li>
    <li class="list-group-item">
      <a class="btn btn-small btn-info" href="{{ URL::to('user/' . $user->id . '/edit') }}">Edit</a>
      {{ Form::open(array('url' => 'user/' . $user->id, 'class' => 'pull-right')) }}
          {{ Form::hidden('_method', 'DELETE') }}
          {{ Form::submit('Delete', array('class' => 'btn btn-warning')) }}
      {{ Form::close() }}
    </li>
  </ul>
</div>

@stop