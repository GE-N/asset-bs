<?php

class Accessory extends Device {

	protected $guarded = array();

	public static $rules = array(
		'owner' => 'required',
		'owner_state' => 'required',
		'type' => 'required',
		'serial' => 'required',
		'brand' => 'required',
		'accessory_state' => 'required',
	);

	public static $stateList = array(
	    'work' 			=> 'Work', 
	    'no available' 	=> 'No Available', 
	    'ruined' 		=> 'Ruined', 
	    'lost' 			=> 'Lost', 
	    'fixing' 		=> 'Fixing'
	);

	public function alias()
	{
		return $this->type." ".$this->brand;
	}
}
