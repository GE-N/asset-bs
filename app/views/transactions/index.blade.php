@extends('layouts.olson')

@section('pageTitle')

<h2>Transactions</h2>

@if( !Auth::guest() && Auth::user()->isAdminRole())
    <p>{{ link_to_route('transactions.create', 'Add new transaction') }}</p>
@endif

@stop

@section('main')

@if ($transactions->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Requestor</th>
				<th>Action</th>
				<th>Device</th>
				<th>From</th>
				<th>To</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($transactions as $transaction)
				<tr>

					<td>{{{ User::find($transaction->user_id)->name }}}</td>
					<td>{{{ $transaction->action }}}</td>
					<td>{{{ Device::deviceAlias($transaction->device_type, $transaction->device_id) }}}</td>
					<td>{{{ $transaction->from }}}</td>
					<td>{{{ $transaction->to }}}</td>

					<!-- Request state -->
					@if($transaction->action == 'request')

						@if( Auth::user()->isAdminRole() )

							<!-- If admin, can approve or reject -->
						    <td>
						    	{{ Form::open( array('method' 	=> 'POST', 
						    						 'route' 	=> array('transactions.update.action', $transaction->id) )) }}

						    		{{ Form::hidden('action', 'approve') }}
						    		{{ Form::hidden('updater_id', Auth::user()->id )}}
						    		{{ Form::submit('Approve', array('class' => 'btn btn-success')) }}

						    	{{ Form::close() }}
						    </td>

						    <td>
						    	{{ Form::open( array('method' 	=> 'POST', 
						    						 'route' 	=> array('transactions.update.action', $transaction->id) )) }}

						    		{{ Form::hidden('action', 'reject') }}
						    		{{ Form::hidden('updater_id', Auth::user()->id )}}
						    		{{ Form::submit('Reject', array('class' => 'btn btn-danger')) }}

						    	{{ Form::close() }}
						    </td>

						@else

							<td><button type="button" class="btn btn-default active">Pending...</button></td>

							@if($transaction->user_id == Auth::user()->id)
							    <td><button type="button" class="btn btn-danger">Cancel</button></td>
							@else
								<td></td>
							@endif

						@endif
						
					@elseif($transaction->action == 'approve')

						@if( Auth::user()->isAdminRole() )			
							<td>
					    		{{ Form::open( array('method' 	=> 'POST', 
					    						 'route' 	=> array('transactions.update.action', $transaction->id) )) }}

					    		{{ Form::hidden('action', 'borrow') }}
					    		{{ Form::hidden('updater_id', $transaction->user_id )}}
					    		{{ Form::submit('Borrow', array('class' => 'btn btn-success')) }}

						    	{{ Form::close() }}
						    </td>

						    <td>
						    	{{ Form::open( array('method' 	=> 'POST', 
						    						 'route' 	=> array('transactions.update.action', $transaction->id) )) }}

						    	{{ Form::hidden('action', 'cancel') }}
						    	{{ Form::hidden('updater_id', Auth::user()->id )}}
						    	{{ Form::submit('Cancel', array('class' => 'btn btn-danger')) }}

						    	{{ Form::close() }}
						    </td>

						@else

							<td><button type="button" class="btn btn-success active">Ready</button></td>
							<td><button type="button" class="btn btn-danger">Cancel</button></td>

						@endif
						
					@elseif ($transaction->action == 'borrow')

						@if( Auth::user()->isAdminRole() )

							<td>
						    	{{ Form::open( array('method' 	=> 'POST', 
						    						 'route' 	=> array('transactions.update.action', $transaction->id) )) }}

						    		{{ Form::hidden('action', 'return') }}
						    		{{ Form::hidden('updater_id', Auth::user()->id )}}
						    		{{ Form::submit('Return', array('class' => 'btn btn-success')) }}

						    	{{ Form::close() }}
					    	</td>

					    	<td>Other accident?</td>

					    @else

					    	<td><button type="button" class="btn btn-default active">Borrowed</button></td>
					    	<td></td>

						@endif
					
					@elseif($transaction->action == 'return')

						<td><button type="button" class="btn btn-default" disabled="disabled">Returned</button></td>

					@elseif ($transaction->action == 'reject') {
						<td><button type="button" class="btn btn-default" disabled="disabled">Rejected</button></td>						
					}

					@endif

					<!-- Debug path -->
<!-- 					@if(Auth::user()->role == 'admin')

					    <td>
					    	{{ Form::open( array('method' 	=> 'POST', 
					    						 'route' 	=> array('transactions.update.action', $transaction->id) )) }}

					    		{{ Form::hidden('action', 'request') }}
					    		{{ Form::hidden('updater_id', Auth::user()->id )}}
					    		{{ Form::submit('request', array('class' => 'btn btn-danger')) }}

					    	{{ Form::close() }}
					    </td>

					@endif
 -->					

				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no transactions
@endif

@stop
