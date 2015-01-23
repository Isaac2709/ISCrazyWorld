<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CategoriesPosts extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('category_post', function($table){
			$table->increments('id');
			$table->unsignedInteger('category_id');
			$table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
			$table->unsignedInteger('post_id');
			$table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('category_post');
	}

}
