<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class People extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('people', function($table){
			$table->increments('id');
			$table->string('email')->unique();
			$table->string('name', 60);
			$table->string('first_surname', 60);
			$table->string('second_surname', 60);
			$table->string('phone_number', 19);

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
		Schema::drop('people');
	}

}
