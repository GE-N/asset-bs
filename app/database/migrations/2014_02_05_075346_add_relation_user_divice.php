<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelationUserDivice extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// Add user_id on phones's table.
		Schema::table('phones', function ($table)
		{
			$table->integer('user_id')->nullable();
		});

		// Add user_id on simcards's table.
		Schema::table('simcards', function ($table)
		{
			$table->integer('user_id')->nullable();
		});

		// Add user_id on accessories's table.
		Schema::table('accessories', function ($table)
		{
			$table->integer('user_id')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('phones', function ($table)
		{
			$table->dropColumn('user_id');
		});

		Schema::table('simcards', function ($table)
		{
			$table->dropColumn('user_id');
		});

		Schema::table('accessories', function ($table)
		{
			$table->dropColumn('user_id');
		});
	}

}
