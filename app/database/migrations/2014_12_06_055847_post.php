<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Post extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('posts', function($table){
			$table->increments('id');
			$table->unsignedInteger('admin_id');
			$table->foreign('admin_id')->references('people_id')->on('admins')->onDelete('cascade');
			$table->string('title');
			$table->text('body');
			$table->dateTime('date');
			$table->unsignedInteger('category_id')->nullable();
			$table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');

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
		Schema::drop('posts');
	}

}
