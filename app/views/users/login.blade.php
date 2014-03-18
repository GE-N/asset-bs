@extends('layouts.scaffold')

@section('main')

<h1>Login</h1>
<hr />

{{ Form::open( array( 'route' => 'login.auth' )) }}

<ul>

	<li>
		{{ Form::label('username', 'Username :') }}
		{{ Form::text('username') }}
	</li>

	<li>
		{{ Form::label('password', 'Password:') }}
		{{ Form::text('password') }}
	</li>

	<li>
		{{ Form::submit('Login', [ 'class' => 'btn btn-primary' ]) }}
	</li>

</ul>

{{ Form::close() }}

@stop