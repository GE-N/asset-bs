<?php

class SimcardsTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('simcards')->truncate();

		$simcards_data = array(
			"Brainsource,	Self,	AIS,	micro,		896601140041121000,		0817512524",
			"Brainsource,	Self,	AIS,	original,	0403003127508103,		0817512524",
			"Brainsource,	Self,	DTAC,	original,	8966180811120449679,	0880226608",
			"Brainsource,	Self,	DTAC,	micro,		8966181106222055444,	0880221878",
			"Brainsource,	Self,	True,	nano,		n/a,					0830648430",
			"Brainsource,	Self,	AIS,	nano,		n/a,					0819877579",
			"Brainsource,	Self,	DTAC,	nano,		n/a,					0911207021",
			"Brainsource,	Self,	3GX,	original,	n/a,					0905281673",
			"Brainsource,	Self,	3GX,	original,	8966151308210015440,	0919061639",
			"Brainsource,	Self,	3GX,	micro,		8966151308210015432,	0919061638",
			"Brainsource,	Self,	3GX,	nano,		8966151247210007777,	0919061637"
		);

		foreach ($simcards_data as $sim) {
			$vals = explode(',', $sim);

			$simcards[]	= array(
				'owner'			=>	$vals[0],
				'owner_state'	=>	ltrim($vals[1]),
				'operator'		=>	strtolower(ltrim($vals[2])),
				'size'			=>	strtolower(ltrim($vals[3])),
				'sim_id'		=>	ltrim($vals[4]),
				'msisdn'		=>	ltrim($vals[5]),
				'created_at'	=> 	date("Y-m-d H:i:s"),
				'updated_at'	=>	date("Y-m-d H:i:s")
			);
		}

		// Uncomment the below to run the seeder
		DB::table('simcards')->insert($simcards);
	}

}
