@extends('layouts.scaffold')

@section('main')

<h1>All Users</h1>

<p>{{ link_to_route('users.create', 'Add new user') }}</p>

@if ( $users->count() )

    <table class="table table-striped table-bordered">
    	<thead>
            <tr>
                <th>id</th>
                <th>Username</th>
                <th>Email</th>
                <th>Role</th>
            </tr>
    	</thead>

    	<tbody>

    		@foreach ($users as $user) 
    			
    			<tr>
    				<td>{{{ $user->id }}}</td>
    				<td>{{ link_to_route( 'users.show', $user->username, [ 'id' => $user->id ] ) }}</td>
    				<td>{{{ $user->email }}}</td>
    				<td>{{{ $user->role }}}</td>
    			</tr>	
    		
    		@endforeach

    	</tbody>
    </table>

@else
	There are no users.
@endif

@stop