@extends('layouts.olson')

@section('pageTitle')
	<h1>Show User</h1>
@stop

@section('main')

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
		<tr>
			<td>{{{ $user->id }}}</td>
			<td>{{{ $user->username }}}</td>
			<td>{{{ $user->email }}}</td>
			<td>{{{ $user->role }}}</td>
		</tr>	
	</tbody>
</table>

<hr />
<h3>Devices in responsibility</h3>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Type</th>
			<th>Brand</th>
			<th>Model</th>
			<th></th>
		</tr>
	</thead>

	<tbody>

		@foreach ($user->phones as $phone)

			<tr>
				<td>Phone</td>
				<td>{{{ $phone->brand }}}</td>
				<td>{{{ $phone->model }}}</td>
				<td>{{ link_to_route( 'phones.show', 'View', [ $phone->id], [ 'class' => 'btn btn-info' ] ) }}</td>
			</tr>

		@endforeach

		@foreach ($user->simcards as $sim)

			<tr>
				<td>Sim Cards</td>
				<td>{{{ $sim->operator }}}</td>
				<td>{{{ $sim->size }}}</td>
				<td>{{ link_to_route( 'simcards.show', 'View', [ $sim->id], [ 'class' => 'btn btn-info' ] ) }}</td>
			</tr>

		@endforeach

		@foreach ($user->accessories as $accessory)

			<tr>
				<td>Accessories</td>
				<td>{{{ $accessory->brand }}}</td>
				<td>{{{ $accessory->details }}}</td>
				<td>{{ link_to_route( 'accessories.show', 'View', [ $accessory->id], [ 'class' => 'btn btn-info' ] ) }}</td>
			</tr>

		@endforeach

	</tbody>
</table>

@stop