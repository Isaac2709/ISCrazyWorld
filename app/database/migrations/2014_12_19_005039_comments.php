<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Comments extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('comments', function($table){
			$table->increments('id');
			$table->unsignedInteger('post_id');
			$table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
			$table->text('comment');
			$table->string('name', 100);
			$table->string('email');
			$table->date('date');

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
		Schema::drop('comments');
	}

}
