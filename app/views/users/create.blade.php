@extends('layouts.scaffold')

@section('main')

<h1>New User</h1>

<hr />

{{ Form::open( array( 'route' => 'users.store' ) ) }}

<ul>
	<h3>Account</h3>
	<li>
		{{ Form::label('username', 'Username:') }}
		{{ Form::text('username') }}
	</li>

	<li>
		{{ Form::label('password', 'Password:') }}
		{{ Form::password('password') }} 
	</li>

	<li>
		{{ Form::label('email', 'Email:') }}
		{{ Form::email('email') }}
	</li>

	<li>
		{{ Form::label('role', 'Role:') }}
		{{ Form::select('role', User::$roles, 'user') }}
	</li>

	<hr />

	<h3>User's Information</h3>

	<li>
		{{ Form::label('name', 'Name:') }}
		{{ Form::text('name') }}
	</li>

	<li>
		{{ Form::label('tel', 'Tel:') }}
		{{ Form::text('tel') }}
	</li>

	<li>
		{{ Form::label('about', 'About') }}
		{{ Form::textarea('about') }}
	</li>

	<li>
		{{ Form::submit('submit', array('class' => 'btn btn-info')) }}
	</li>
</ul>

{{ Form::close() }}

@stop