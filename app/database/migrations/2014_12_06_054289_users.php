<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Users extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function($table){
			$table->unsignedInteger('people_id');
			$table->foreign('people_id')->references('id')->on('people')->onDelete('cascade');
			$table->primary('people_id');
            $table->string('username');
            $table->string('password');
            $table->string('photo');
            $table->string('language')->default('es');
            $table->string('remember_token', 100)->nullable();

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
		Schema::drop('users');
	}

}
