@extends('layouts.olson')

@section('pageTitle')

<h2>Phones</h2>

@stop

@section('main')

<style>
	.dropdown-menu { z-index: 1050 !important; }
</style>

@if( !Auth::guest() && Auth::user()->isAdminRole() )
    <p>{{ link_to_route('phones.create', 'Add new phone') }}</p>
@endif

@if ($phones->count())

	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Brand</th>
				<th>Model</th>
				<th>Resolution</th>
				<th>OS</th>
				<th>Color</th>

				@if( !Auth::guest())
				    <th>Borrow</th>
				@endif
			</tr>
		</thead>

		<tbody>
			@foreach ($phones as $phone)
			
				<tr>
					<td>{{{ $phone->brand }}}</td>
					<td>{{{ $phone->model }}}</td>
					<td>{{{ $phone->resolution }}}</td>
					<td>{{{ $phone->os }}}</td>
					<td>{{{ $phone->color }}}</td>

						@if( !Auth::guest() )
							<td>
								<!-- If current user is admin, actions button shown as edit & delete for manage devices information. -->
								@if( Auth::user()->isAdminRole() )

									<td>
										{{ link_to_route('phones.edit', 'Edit', 
													array($phone->id), 
													array('class' => 'btn btn-info')) }}
									</td>

						            <td>{{ HTML::deleteButton('phones', $phone) }}</td>

						        <!-- But if current user in normal user, action button show as `borrow` for request or `N/A` if can not do anythings (phone was borrowed). -->
								@elseif( Device::canBorrowRequest($phone) )
									<td>{{ HTML::requestButton('phones', $phone) }}</td>
						        @else
						        	<td><button type='button' class='btn btn-default' disabled='disabled'>N/A</button></td>
								@endif

							</td>
					    @endif
				</tr>

			@endforeach
		</tbody>
	</table>
@else
	There are no phones
@endif

@stop
