@extends('layouts.olson')

@section('pageTitle')

<h2>Accessories</h2>

@stop

@section('main')



@if( !Auth::guest() && Auth::user()->isAdminRole() )
	<p>{{ link_to_route('accessories.create', 'Add new accessory') }}</p>
@endif

@if ($accessories->count())

	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Serial</th>
				<th>Type</th>
				<th>Brand</th>
				<th>Note</th>
				<th>Owner</th>
				<th>Status</th>
				
				@if(!Auth::guest())
				    <th>Borrow</th>
				@endif
				
			</tr>
		</thead>

		<tbody>
			@foreach ($accessories as $accessory)
				<tr>
					<td>{{{ $accessory->serial }}}</td>
					<td>{{{ $accessory->type }}}</td>
					<td>{{{ $accessory->brand }}}</td>
					<td>{{{ $accessory->details }}}</td>
					<td>{{{ $accessory->owner }}} @ {{{ $accessory->owner_state }}}</td>
					<td>{{{ $accessory->accessory_state }}}</td>

					@if(!Auth::guest())

						@if(Auth::user()->isAdminRole())
							<td>{{ link_to_route('accessories.edit', 'Edit', array($accessory->id), array('class' => 'btn btn-info')) }}</td>
							<td>{{ HTML::deleteButton('accessories', $accessory) }}</td>
	                    @else
	                    	@if( Device::canBorrowRequest($accessory) )
			                   	<td>{{ HTML::requestButton('accessories', $accessory) }}</td>
			                @else 
			                	<td><button type='button' class='btn btn-default' disabled='disabled'>N/A</button></td>
	                    	@endif

						@endif

					@endif

				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no accessories
@endif

@stop
