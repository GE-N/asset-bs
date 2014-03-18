@extends('layouts.olson')

@section('pageTitle')

<h2>Simcards</h2>

@stop

@section('main')

@if( !Auth::guest() && Auth::user()->isAdminRole() )
	<p>{{ link_to_route('simcards.create', 'Add new simcard') }}</p>
@endif

@if ($simcards->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Operator</th>
				<th>MSISDN</th>
				<th>Size</th>
				<th>Owner</th>

				@if(!Auth::guest())
				    <th>Borrow</th>
				@endif

			</tr>
		</thead>

		<tbody>

			@foreach ($simcards as $simcard)

				<tr>
					<td>{{{ $simcard->carrierName() }}}</td>
					<td>{{{ $simcard->msisdn }}}</td>
					<td>{{{ $simcard->simSize() }}}</td>
					<td>{{{ $simcard->owner }}} @ {{{ $simcard->owner_state }}}</td>

					@if( !Auth::guest() )

						@if( Auth::user()->isAdminRole() )
						    <td>
						    	{{ link_to_route('simcards.edit', 'Edit', 
						    						array($simcard->id), 
						    						array('class' => 'btn btn-info')) }}
						    </td>
		                    <td>{{ HTML::deleteButton('phones', $simcard) }}</td>
		                @elseif( Device::canBorrowRequest($simcard) )
							<td>{{ HTML::requestButton('simcards', $simcard) }}</td>
						@else
							<td><button type='button' class='btn btn-default' disabled='disabled'>N/A</button></td>
						@endif
	                    
                    @endif
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no simcards
@endif

@stop
