<?php

class PhonesTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('phones')->truncate();

		$phoneData = array(
			"Brainsource,	self,		Samsung,	Galaxy Tab 7.7,		1280x800,	Android 4.1,	Black,		All,	work,	work",
			"Brainsource,	self,		Apple,		iPad2 Wifi&3G 16GB,	1024x768,	ios7,			Black,		All,	work,	work",
			"Brainsource,	self,		Apple,		iPhone4 16GB,		1024x768,	ios7,			black,		All,	work,	lost",
			"Brainsource,	self,		Apple,		iPhone4s 32GB,		960x640,	ios6,			white,		All,	work,	lost",
			"Brainsource,	self,		Apple,		iPhone5 32GB,		1136x640,	ios7,			black,		All,	work,	lost",
			"Brainsource,	self,		Apple,		iPhone5 32GB,		1136x640,	ios6,			black,		All,	work,	lost",
			"Brainsource,	self,		I-mobile,	U 3502,				N/A,		N/A,			N/A,		All,	lost,	no available",
			"Brainsource,	self,		I-mobile,	S383,				N/A,		N/A,			N/A,		All,	lost,	no available",
			"Brainsource,	self,		I-mobile,	S252,				N/A,		N/A,			N/A,		All,	lost,	no available",
			"Brainsource,	self,		I-mobile,	S252,				N/A,		N/A,			N/A,		All,	lost,	no available",
			"Brainsource,	self,		Samsung,	Galaxy NoteII,		1280x720,	N/A,			N/A,		All,	lost,	no available",
			"Brainsource,	self,		Samsung,	Galaxy SIII,		1280x720,	N/A,			N/A,		All,	work,	work",
			"SAPP,			Borrowed,	I-mobile,	style 8.2,			480c854,	Android 4.2,	black,		All,	work,	work",
			"SAPP,			Borrowed,	I-mobile,	IQ X3,				1920x1080,	Android 4.2,	White,		All,	work,	work",
			"SAPP,			Borrowed,	I-mobile,	IQ 1.1,				540x960,	Android 4.1,	white,		All,	work,	work",
			"SAPP,			Borrowed,	I-mobile,	i-STYLE 7.3,		480x854,	Android 4.2,	gray,		All,	work,	work",
			"SAPP,			Borrowed,	I-mobile,	i-note 3,			1024x600,	Android 4.1,	gray,		All,	work,	work",
			"SAPP,			Borrowed,	I-mobile,	i-STYLE 2.1A,		320x480,	Android 4.2,	black,		ais,	work,	work",
			"SAPP,			Borrowed,	I-mobile,	i-STYLE 2.1 A,		320x480,	Android 4.2,	black,		ais,	work,	work",
			"SAPP,			Borrowed,	I-mobile,	IQ X3 A,			1920x1080,	Android 4.2,	white,		ais,	work,	work",
			"SAPP,			Borrowed,	I-mobile,	IQ9 A,				1280x720,	Android 4.2,	white,		ais,	work,	work",
			"SAPP,			Borrowed,	I-mobile,	IQ9 A,				1280x720,	Android 4.2,	white,		ais,	work,	work",
		);

		foreach ($phoneData as $phoneStr) {
			$vals = explode(',', $phoneStr);

			$phones[] = array(
				'owner'				=> 	$vals[0],
				'owner_state'		=> 	ltrim($vals[1]),
				'brand'				=>	ltrim($vals[2]),
				'model'				=>	ltrim($vals[3]),
				'resolution'		=>	ltrim($vals[4]),
				'os'				=>	ltrim($vals[5]),
				'color'				=>	ltrim($vals[6]),
				'operator'			=>	ltrim($vals[7]),
				'adaptor'			=>	ltrim($vals[8]),
				'cable'				=>	ltrim($vals[9]),
				'created_at'		=> 	date("Y-m-d H:i:s"),
				'updated_at'		=>	date("Y-m-d H:i:s")
			);
		}

		// Uncomment the below to run the seeder
		DB::table('phones')->insert($phones);
	}

}
