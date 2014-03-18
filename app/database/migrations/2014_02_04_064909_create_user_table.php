<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function($t)
		{
			$t->increments('id');
			$t->string('username')->unique();
			$t->string('password');
			$t->string('email')->unique();

			$t->string('name');
			$t->string('tel');
			$t->text('about');

			$roles = [ 'superadmin', 'admin', 'user' ];
			$t->enum('role', $roles);

			$t->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
