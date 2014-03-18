<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePhonesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('phones', function(Blueprint $table) {
			$table->increments('id');

			$table->string('owner');
			$ownerState = ['self', 'borrow', 'returned', 'other'];
			$table->enum('owner_state', $ownerState);

			$deviceState = ['no available', 'work', 'ruined', 'lost', 'fixing' ];

			$table->string('brand');
			$table->string('model');
			$table->string('screen_type')->nullable();
			$table->string('screen_size')->nullable();
			$table->string('resolution');
			$table->string('os');
			$table->string('color');
			$table->string('operator')->nullable();
			$table->string('imie1')->nullable();
			$table->string('imie2')->nullable();
			$table->string('udid')->nullable();
			$table->string('mac')->nullable();
			$table->enum('device_state', $deviceState)->nullable();

			$table->enum('adaptor', $deviceState);
			$table->enum('cable', $deviceState);
			$table->enum('case', $deviceState)->nullable();
			$table->enum('headset', $deviceState)->nullable();

			$table->text('note')->nullable();
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
		Schema::drop('phones');
	}

}
