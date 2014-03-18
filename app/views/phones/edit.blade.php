@extends('layouts.scaffold')

@section('main')

<h1>Edit Phone</h1>
{{ Form::model($phone, array('method' => 'PATCH', 'route' => array('phones.update', $phone->id))) }}
	<h3>Ownership</h3>
    <ul>
        <li>
            {{ Form::label('owner', 'Owner:') }}
            {{ Form::text('owner') }}
        </li>

        <li>
            {{ Form::label('owner_state', 'Owner State:') }}
            {{ Form::select('owner_state', array(
                'self'      => 'self', 
                'borrow'    => 'borrow', 
                'returned'  => 'returned', 
                'other'     => 'other'
            ), 'self' ) }}
        </li>
    </ul>

    <hr />

    <h3>Device informations</h3>
    <ul>

        <li>
            {{ Form::label('brand', 'Brand:') }}
            {{ Form::text('brand') }}
        </li>

        <li>
            {{ Form::label('model', 'Model:') }}
            {{ Form::text('model') }}
        </li>

        <li>
            <?php 
                $device_state = array(
                    'work' => 'work', 
                    'no available' => 'no available', 
                    'ruined' => 'ruined', 
                    'lost' => 'lost', 
                    'fixing' => 'fixing'
                );
             ?>

            {{ Form::label('state', 'State:') }}
            {{ Form::select('device_state', $device_state, 'work') }}
        </li>

        <li>
            {{ Form::label('screen_type', 'Screen Type:') }}
            {{ Form::text('screen_type') }}
        </li>

        <li>
            {{ Form::label('screen_size', 'Screen Size:') }}
            {{ Form::text('screen_size') }}
        </li>

        <li>
            {{ Form::label('resolution', 'Screen Resolution:') }}
            {{ Form::text('resolution') }}
        </li>

        <li>
            {{ Form::label('os', 'OS:') }}
            {{ Form::text('os') }}
        </li>

        <li>
            {{ Form::label('color', 'Color:') }}
            {{ Form::text('color') }}
        </li>

        <li>
            {{ Form::label('operator', 'Operator:') }}
            {{ Form::text('operator') }}
        </li>

        <li>
            {{ Form::label('imie1', 'IMIE1:') }}
            {{ Form::text('imie1') }}
        </li>

        <li>
            {{ Form::label('imie2', 'IMIE2:') }}
            {{ Form::text('imie2') }}
        </li>

        <li>
            {{ Form::label('udid', 'UDID:') }}
            {{ Form::text('udid') }}
        </li>

        <li>
            {{ Form::label('mac', 'MAC Address:') }}
            {{ Form::text('mac') }}
        </li>

        <hr />
        <h3>Accessories</h3>

        <li>
            {{ Form::label('adaptor', 'Adaptor:') }}
            {{ Form::select('adaptor', $device_state, 'work') }}
        </li>

        <li>
            {{ Form::label('cable', 'Cable:') }}
            {{ Form::select('cable', $device_state, 'work') }}
        </li>

        <li>
            {{ Form::label('case', 'Case:') }}
            {{ Form::select('case', $device_state, 'work') }}
        </li>

        <li>
            {{ Form::label('headset', 'Headset:') }}
            {{ Form::select('headset', $device_state, 'work') }}
        </li>

        <hr />
        <h3>Notes:</h3>
        
        <li>
            {{ Form::label('note', 'Note:') }}
            {{ Form::textarea('note') }}
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
