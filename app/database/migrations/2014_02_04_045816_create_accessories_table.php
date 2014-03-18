<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAccessoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('accessories', function(Blueprint $table) {
			$table->increments('id');

			$table->string('owner');
			$ownerState = ['self', 'borrow', 'returned', 'other'];
			$table->enum('owner_state', $ownerState);

			$table->string('type');
			$table->string('serial');
			$table->string('brand');

			$accessoryState = [ 'no available', 'work', 'ruined', 'lost', 'fixing' ];
			$table->enum('accessory_state', $accessoryState);

			$table->text('details');
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
		Schema::drop('accessories');
	}

}
