@extends('layouts.scaffold')

@section('main')

<h1>Show Transaction</h1>

<p>{{ link_to_route('transactions.index', 'Return to all transactions') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>User_id</th>
				<th>Action</th>
				<th>Device_id</th>
				<th>From</th>
				<th>To</th>
				<th>Updater_id</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $transaction->user_id }}}</td>
					<td>{{{ $transaction->action }}}</td>
					<td>{{{ $transaction->device_id }}}</td>
					<td>{{{ $transaction->from }}}</td>
					<td>{{{ $transaction->to }}}</td>
					<td>{{{ $transaction->updater_id }}}</td>
                    <td>{{ link_to_route('transactions.edit', 'Edit', array($transaction->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('transactions.destroy', $transaction->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
