<?php

class Transaction extends Eloquent {
	protected $guarded = array();

	public static $action = array(
		'request'	=> 'Request',
		'approve'	=> 'Approve',
		'reject'	=> 'Reject',
		'borrow'	=> 'Borrow',
		'return'	=> 'Return',
		'cancel'	=> 'Cancel'
	);

	public static $rules = array(
		'user_id' => 'required',
		'action' => 'required',
		'device_id' => 'required',
		'from' => 'required',
		'to' => 'required',
		'updater_id' => 'required'
	);

	public static function actionForUserRole($role='user')
	{
		if ($role == 'user') {
			return array_only( Transaction::$action, array('request', 'cancel') );
		}
		else if($role == 'admin') {
			return Transaction::$action;
		}
	}

	public function deviceItem()
	{
		$deviceType = $this->device_type;

		if ( 'phone' == $deviceType) {
			return Phone::find($this->device_id);
		}
		else if( 'sim' == $deviceType) {
			return  Simcard::find($this->device_id);
		}
		else if( 'accessory' == $deviceType) {
			return Accessory::find($this->device_id);
		}

		throw new Exception('Transaction::Unknown device type `'.$deviceType.'`', 1);
	}

	public function updateAction($newAction, $user_id)
	{
		$actionVal = Transaction::$action[$newAction];

		if ( !is_null($actionVal) ) {

			// If updated to `borrow` state.So map device's user id state.
			if ('borrow' == $newAction) {
				$device = $this->deviceItem();
				$device->user_id = $user_id;
				$device->save();
			}
			// On the other way. If `return` start, remove user_id from device.
			else if ('return' == $newAction) {
				$device = $this->deviceItem();
				$device->user_id = NULL;
				$device->save();
			}

			$this->action 		= $newAction;
			$this->updater_id 	= $user_id;
			$this->save();

			return;
		}

		throw new Exception('can not update action from invalid action.', 1);
	}
}
