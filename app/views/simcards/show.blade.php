@extends('layouts.scaffold')

@section('main')

<h1>Show Simcard</h1>

<p>{{ link_to_route('simcards.index', 'Return to all simcards') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Owner</th>
				<th>Owner_state</th>
				<th>Operator</th>
				<th>Size</th>
				<th>Sim ID</th>
				<th>MSISDN</th>
				<th>Promotion</th>
				<th>Custodian</th>
				<th></th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $simcard->owner }}}</td>
			<td>{{{ $simcard->owner_state }}}</td>
			<td>{{{ $simcard->operator }}}</td>
			<td>{{{ $simcard->size }}}</td>
			<td>{{{ $simcard->sim_id }}}</td>
			<td>{{{ $simcard->msisdn }}}</td>
			<td>{{{ $simcard->promotion }}}</td>

			@if(!is_null($simcard->user))
				<td>{{ link_to_route('users.show', $simcard->user->name, array($simcard->user->id)) }}</td>
			@else
				<td></td>    
			@endif

            <td>{{ link_to_route('simcards.edit', 'Edit', array($simcard->id), array('class' => 'btn btn-info')) }}</td>
            <td>
                {{ Form::open(array('method' => 'DELETE', 'route' => array('simcards.destroy', $simcard->id))) }}
                    {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                {{ Form::close() }}
            </td>
		</tr>
	</tbody>
</table>

@stop
