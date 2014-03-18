<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSimcardsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('simcards', function(Blueprint $table) {
			$table->increments('id');

			// Owner section
			$table->string('owner');
			$ownerState = ['self', 'borrow', 'returned', 'other'];
			$table->enum('owner_state', $ownerState);
			
			// 
			$table->string('operator');
			$table->string('size');
			$table->string('sim_id')->nullable();
			$table->string('msisdn');
			$table->text('promotion')->nullable();
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('simcards');
	}

}
