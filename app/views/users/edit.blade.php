@extends('layouts.scaffold')

@section('main')

<h1>Edit User</h1>

<hr />

{{ Form::model($user, array('method' => 'PATCH', 'route' => array('users.update', $user->id))) }}

<ul>
	<h3>Account</h3>
	<li>
		{{ Form::label('username', 'Username:') }}
		{{ Form::text('username', $user->username) }}
	</li>

	<li>
		{{ Form::label('password', 'Password:') }}
		{{ Form::password('password') }} 
	</li>

	<li>
		{{ Form::label('email', 'Email:') }}
		{{ Form::email('email', $user->email) }}
	</li>

	<li>
		{{ Form::label('role', 'Role:') }}
		{{ Form::select('role', User::$roles, $user->role) }}
	</li>

	<hr />

	<h3>User's Information</h3>

	<li>
		{{ Form::label('name', 'Name:') }}
		{{ Form::text('name', $user->name) }}
	</li>

	<li>
		{{ Form::label('tel', 'Tel:') }}
		{{ Form::text('tel', $user->tel) }}
	</li>

	<li>
		{{ Form::label('about', 'About') }}
		{{ Form::textarea('about', $user->about) }}
	</li>

	<li>
		{{ Form::submit('submit', array('class' => 'btn btn-info')) }}
	</li>
</ul>

@stop