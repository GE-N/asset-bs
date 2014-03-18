@extends('layouts.olson')

@section('header')

<!-- <link rel="stylesheet" href="http://eternicode.github.io/bootstrap-datepicker/bootstrap-datepicker/css/datepicker3.css"> -->

<!-- http://eternicode.github.io/bootstrap-datepicker/?markup=range&format=&weekStart=&startDate=&endDate=&startView=0&minViewMode=0&todayBtn=false&language=en&orientation=auto&multidate=&multidateSeparator=&keyboardNavigation=on&forceParse=on#sandbox -->
<!-- <script src="//code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://eternicode.github.io/bootstrap-datepicker/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="http://eternicode.github.io/bootstrap-datepicker/bootstrap-datepicker/js/locales/bootstrap-datepicker.th.js"></script>
 -->
@stop

@section('pageTitle')

<h1>Create Transaction</h1>

@stop

@section('main')


{{ Form::open(array('route' => 'transactions.store')) }}

	<ul>
        <li>
            {{ Form::label('user_id', 'Requestor:') }}
            {{ Form::text('username', Auth::user()->username, array('disabled')) }}
            {{ Form::hidden('user_id', Auth::user()->id) }}
        </li>

        <li>
            {{ Form::label('action', 'Action:') }}
            {{ Form::select('action', array_only(Transaction::actionForUserRole(Auth::user()->role), array('request')) , 'request') }}
        </li>

        <li>
            {{ Form::label('device_type', 'Device Type:') }}

            {{ Form::radio('device_type', 'phone',      Input::get('type') == 'phone', ['id' => 'optPhone'] ) }} Phone
            {{ Form::radio('device_type', 'accessory',  Input::get('type') == 'accessory', ['id' => 'optAccessory'] ) }} Accessory
            {{ Form::radio('device_type', 'sim',        Input::get('type') == 'sim', ['id' => 'optSim'] ) }} Simcard
        </li>   

        <li>
            {{ Form::label('device_id', 'Device:', [ 'id' => 'device_id_label']) }}

            {{ Form::select('device_id', Phone::phoneSelectList('available'),          Input::get('id'), [ 'id' => 'phoneSelect']) }}
            {{ Form::select('device_id', Accessory::accessorySelectList('available'),  Input::get('id'), [ 'id' => 'accessorySelect']) }}
            {{ Form::select('device_id', Simcard::simSelectList('available'),          Input::get('id'), [ 'id' => 'simcardSelect']) }}
        </li>

        <li>
            {{ Form::label('from', 'From:') }}
            {{ Form::text('from', '', array( 'class' => 'datepicker')) }}
        </li>

        <li>
            {{ Form::label('to', 'To:') }}
            {{ Form::text('to', '', array( 'class' => 'datepicker')) }}
        </li>

        <li>
            {{ Form::hidden('updater_id', Auth::user()->id) }}
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

{{ HTML::script('/js/transaction.js') }}

@stop


