@extends('layouts.scaffold')

@section('main')

<h1>Show Accessory</h1>
<hr/>

<p>{{ link_to_route('accessories.index', 'Return to all accessories') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Owner</th>
			<th>Owner_state</th>
			<th>Type</th>
			<th>Serial</th>
			<th>Brand</th>
			<th>Accessory_state</th>
			<th>Details</th>
			<th>Custodian</th>
			<th></th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $accessory->owner }}}</td>
			<td>{{{ $accessory->owner_state }}}</td>
			<td>{{{ $accessory->type }}}</td>
			<td>{{{ $accessory->serial }}}</td>
			<td>{{{ $accessory->brand }}}</td>
			<td>{{{ $accessory->accessory_state }}}</td>
			<td>{{{ $accessory->text }}}</td>

			@if(!is_null($accessory->user))
				<td>{{ link_to_route('users.show', $accessory->user->name, array($accessory->user->id)) }}</td>
			@else
				<td></td>    
			@endif

            <td>{{ link_to_route('accessories.edit', 'Edit', array($accessory->id), array('class' => 'btn btn-info')) }}</td>
            <td>
                {{ Form::open(array('method' => 'DELETE', 'route' => array('accessories.destroy', $accessory->id))) }}
                    {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                {{ Form::close() }}
            </td>
		</tr>
	</tbody>
</table>

@stop
