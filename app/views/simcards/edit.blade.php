@extends('layouts.scaffold')

@section('main')

<h1>Edit Simcard</h1>
{{ Form::model($simcard, array('method' => 'PATCH', 'route' => array('simcards.update', $simcard->id))) }}
	<ul>

        <h3>Owner</h3>

        <li>
            {{ Form::label('owner', 'Owner:') }}
            {{ Form::text('owner') }}
        </li>

        <li>
            {{ Form::label('owner_state', 'Owner State:') }}
            {{ Form::select('owner_state', array(
                'self'      => 'Self', 
                'borrow'    => 'Borrow', 
                'returned'  => 'Returned', 
                'other'     => 'Other'), 'self') }}
        </li>

        <hr/>
        <h3>Sim Informations</h3>
        
        <li>
            {{ Form::label('operator', 'Operator:') }}
            {{ Form::select('operator', Simcard::$carrierList, ''); }}
        </li>

        <li>
            {{ Form::label('size', 'Sim\'s Size:') }}
            {{ Form::select('size', Simcard::simSizeList(), 'original') }}
        </li>

        <li>
            {{ Form::label('sim_id', 'Sim ID:') }}
            {{ Form::text('sim_id') }}
        </li>

        <li>
            {{ Form::label('msisdn', 'MSISDN:') }}
            {{ Form::text('msisdn') }}
        </li>

        <li>
            {{ Form::label('promotion', 'Promotion:') }}
            {{ Form::textarea('promotion') }}
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
