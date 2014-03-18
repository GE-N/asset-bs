<?php

class Device extends Eloquent {

	protected $guarded = array();

	public static $rules = array();

	public function user()
	{
		return $this->belongsTo('User');
	}

	public static function phoneSelectList($value='all')
	{
		$phones = Phone::whereNull('user_id')->get();

		foreach ($phones as $phone) {
			$phonesList[ $phone->id ] = $phone->alias();
		}

		return $phonesList;
	}

	public static function accessorySelectList($value='all')
	{
		$accessories = Accessory::whereNull('user_id')->get();

		foreach ($accessories as $accessory) {
			$accessoriesList[ $accessory->id ] = $accessory->alias();
		}

		return $accessoriesList;
	}

	public static function simSelectList($value='all')
	{

		$sims = Simcard::whereNull('user_id')->get();

		foreach ($sims as $sim) {
			$simcardList[ $sim->id ] = $sim->alias();
		}

		return $simcardList;
	}

	public static function deviceAlias($type, $id)
	{
		if ('phone' == $type) {
			return Phone::find($id)->alias();
		}
		else if ('accessory' == $type) {
			return Accessory::find($id)->alias();
		}
		else if ('sim' == $type) {
			return Simcard::find($id)->alias();
		}
	}

	public static $classKey = array(
		'Phone'			=>	'phone',
		'Accessory'		=>	'accessory',
		'Simcard'		=>	'sim'
	);

	public static function canBorrowRequest($item)
	{
		$itemType = get_class($item);

		$record = 	Transaction::whereNested(function($query) use ($item, $itemType){
						$query->where('device_type', '=', Device::$classKey[$itemType]);
						$query->where('device_id', '=', $item->id);
					})
					->orderBy('updated_at', 'desc')
					->first();

		// Not ever been borrow.
		if ( is_null($record)) {
			return true;
		}

		// Ever been borrowed but not in approved or borrowed.
		return ($record->action != 'approve') && ($record->action != 'borrow');
	}
}
