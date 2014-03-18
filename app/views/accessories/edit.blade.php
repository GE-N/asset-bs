@extends('layouts.scaffold')

@section('main')

<h1>Edit Accessory</h1>
{{ Form::model($accessory, array('method' => 'PATCH', 'route' => array('accessories.update', $accessory->id))) }}
	<ul>
        <h3>Owner</h3>
        <li>
            {{ Form::label('owner', 'Owner:') }}
            {{ Form::text('owner') }}
        </li>

        <li>
            {{ Form::label('owner_state', 'Owner state:') }}
            {{ Form::select('owner_state', array(
                'self'      => 'Self', 
                'borrow'    => 'Borrow', 
                'returned'  => 'Returned', 
                'other'     => 'Other'
            ), 'self' ) }}
        </li>

        <hr />
        <h3>Accessory Informations</h3>

        <li>
            {{ Form::label('serial', 'Serial:') }}
            {{ Form::text('serial') }}
        </li>

        <li>
            {{ Form::label('type', 'Type:') }}
            {{ Form::text('type') }}
        </li>

        <li>
            {{ Form::label('brand', 'Brand:') }}
            {{ Form::text('brand') }}
        </li>

        <li>
            {{ Form::label('accessory_state', 'Accessory Status:') }}
            {{ Form::select('accessory_state', Accessory::$stateList, '') }}
        </li>

        <li>
            {{ Form::label('details', 'Details:') }}
            {{ Form::textarea('details') }}
        </li>

        <li>
            {{ Form::submit('Submit', array('class' => 'btn btn-info')) }}
        </li>
    </ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
