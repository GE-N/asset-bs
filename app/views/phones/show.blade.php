@extends('layouts.scaffold')

@section('main')

<h1>Show Phone</h1>

<p>{{ link_to_route('phones.index', 'Return to all phones') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Id</th>
				<th>Brand</th>
				<th>Model</th>
				<th>Screen_type</th>
				<th>Screen_size</th>
				<th>Resolution</th>
				<th>Os</th>
				<th>Color</th>
				<th>Custodian</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $phone->id }}}</td>
			<td>{{{ $phone->brand }}}</td>
			<td>{{{ $phone->model }}}</td>
			<td>{{{ $phone->screen_type }}}</td>
			<td>{{{ $phone->screen_size }}}</td>
			<td>{{{ $phone->resolution }}}</td>
			<td>{{{ $phone->os }}}</td>
			<td>{{{ $phone->color }}}</td>

			@if(!is_null($phone->user))
				<td>{{ link_to_route('users.show', $phone->user->name, array($phone->user->id)) }}</td>
			@else
				<td></td>    
			@endif
			
		    <td>{{ link_to_route('phones.edit', 'Edit', array($phone->id), array('class' => 'btn btn-info')) }}</td>
            <td>
                {{ Form::open(array('method' => 'DELETE', 'route' => array('phones.destroy', $phone->id))) }}
                    {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                {{ Form::close() }}
            </td>
			
		</tr>
	</tbody>
</table>

@stop
