<?php

class AccessoriesTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('accessories')->truncate();

		$accessories_data = array(
			"Brainsource,	self,	ChargerSet,	innergie,	30pin/MicroUSB-USB Cable + 2port-USB Adaptor",
			"Brainsource,	self,	Cable,		innergie,	30pin/Lightnining-USB Cable",
			"Brainsource,	self,	Cable,		innergie,	30pin/Lightnining-USB Cable",
			"Brainsource,	self,	Cable,		Apple,		Lightning-USB cable",
			"Brainsource,	self,	Adaptor,	Apple,		VGA-HDMI Adaptor"
		);

		foreach ($accessories_data as $accessory) {
			$vals = explode(',', $accessory);

			$accessories[] = array(
				'owner'				=>	$vals[0],
				'owner_state'		=>	$vals[1],
				'type'				=>	$vals[2],
				'brand'				=>	$vals[3],
				'details'			=>	$vals[4],
				'serial'			=>	'',
				'accessory_state'	=>	'work',
				'created_at'		=> 	date("Y-m-d H:i:s"),
				'updated_at'		=>	date("Y-m-d H:i:s")
			);
		}

		// Uncomment the below to run the seeder
		DB::table('accessories')->insert($accessories);
	}

}
