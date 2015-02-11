<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('posts', function(Blueprint $table)
		{
			$table->increments('id');
			$table->text('title');
			$table->dateTime('publish_date');
			$table->text('content')->nullable();
			$table->text('excerpt')->nullable();
			$table->text('url', 255);
			$table->text('image_src', 255)->nullable();
			$table->integer('source_id')->unsigned();;
			$table->nullableTimestamps();
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
