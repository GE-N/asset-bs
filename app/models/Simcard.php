<?php

class Simcard extends Device {

	protected $guarded = array();

	public static $rules = array(
		'owner' => 'required',
		'owner_state' => 'required',
		'operator' => 'required',
		'size' => 'required',
		'msisdn' => 'required'
	);

	// References : http://en.wikipedia.org/wiki/List_of_mobile_network_operators_of_the_Asia_Pacific_region#Thailand
	public static $carrierList = array(
			'3gx'       => '3GX',
	        'ais'       => 'AIS/AIS 3G',
	        'dtac'      => 'DTAC/DTAC Trinet',
	        'true'      => 'True/Truemove-H',
	        'tot'       => 'TOT3G',
	        'my'        => 'MY',
	        'wepct'     => 'WEPCT',
	        '365'       => '365 3G',
	        'iec3g'     => 'IEC3G',
	        'mojo3g'    => 'mojo3G',
	        'i-kool'    => 'i-kool Real 3G');

	public function carrierName()
	{
		return Simcard::$carrierList[ $this->operator ];
	}

	public static function simSizeList()
	{
		$simSizeList = array(
            'original'    => 'Original',
            'micro'       => 'Micro Sim',
            'nano'        => 'Nano Sim'  
        );

        return $simSizeList;
	}

	public function simSize()
	{
		$sizeList = $this->simSizeList();

		return $sizeList[ $this->size ];
	}

	public function alias()
	{
		return $this->carrierName()." ".$this->msisdn;
	}
}
