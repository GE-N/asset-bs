<?php 

HTML::macro('deleteButton', function($routeCls, $item){

	$destroyRoute = $routeCls.'.destroy';

	$content[] = Form::open(array('method' => 'DELETE', 'route' => array($destroyRoute, $item->id)));
    $content[] = Form::submit('Delete', array('class' => 'btn btn-danger'));
    $content[] = Form::close();

    return join("\n", $content);
});

HTML::macro('_shortBodyRequestForm', function($type, $item) {

	$form[] = Form::hidden('user_id', Auth::user()->id);
	$form[] = Form::hidden('action', 'request');

	$form[] = Form::hidden('device_type', $type);
	$form[] = Form::hidden('device_id', $item->id );
	$form[] = Form::hidden('updater_id', Auth::user()->id);

    $form[] = Form::label('from', 'From:');
    $form[] = Form::text('from', '', array( 'class' => 'datepicker'));
    $form[] = Form::label('to', 'To:');
    $form[] = Form::text('to', '', array( 'class' => 'datepicker'));

    return join("\n", $form);
});

HTML::macro('requestButton', function($routeCls, $item) {

	$deviceTypeMap = array(
		'phones'		=>	'phone',
		'accessories'	=>	'accessory',
		'simcards'		=>	'sim'
	);

	$modal[] = sprintf("<a href=#%s class='btn btn-info' data-toggle='modal'>Request</a>", $item->id);
	$modal[] = sprintf("<div id='%s' class='modal fade' tabindex='-1' role='dialog' aria-labelledby='phoneModalLabel' aria-hidden='true'>", $item->id);
	$modal[] = sprintf("<div class='modal-dialog'>
							<div class='modal-content'>
								<div class='modal-header'>
									<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>x</button>
									<h4 class='modal-title'>Borrow - %s</h4>
								</div>", $item->alias());
	$modal[] = Form::open(array('route' => 'transactions.store'));

	$modal[] = sprintf("<div class='modal-body'>");
	$modal[] = HTML::_shortBodyRequestForm($deviceTypeMap[$routeCls], $item);
	$modal[] = sprintf("</div>
		
						<div class='modal-footer'>
							<button type='button' class='btn btn-default' data-dismiss='modal' aria-hidden='true'>Cancel</button>");
	$modal[] = Form::submit('Submit', ['class' => 'btn btn-primary']);
	$modal[] = sprintf("</div>");
	$modal[] = Form::close();
	$modal[] = sprintf("</div></div></div>");

	return join("\n", $modal);
});

?>