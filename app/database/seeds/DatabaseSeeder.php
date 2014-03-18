<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		// $this->call('UserTableSeeder');
		$this->call('PhonesTableSeeder');
		$this->call('SimcardsTableSeeder');
		$this->call('AccessoriesTableSeeder');
		$this->call('TransactionsTableSeeder');
	}

}