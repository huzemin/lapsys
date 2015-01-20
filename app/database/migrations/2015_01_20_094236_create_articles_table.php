<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if(!Schema::hasTable('articles')) {
			Schema::create('articles', function(Blueprint $table){
				$table->increments('id');
				$table->integer('user_id');
				$table->string('title',255)->index();
				$table->string('description',255);
				$table->string('author',30);
				$table->string('refer',255);
				$table->string('website',255);
				$table->string('tags',255);
				$table->longtext('content');
				$table->integer('viewnum');
				$table->integer('storenum');
				$table->integer('likenum');
				$table->smallinteger('status');
				$table->boolean('s_comment');
				$table->boolean('s_login');
				$table->boolean('s_store');
				$table->timestamps();
				$table->softDeletes();
			});
		}
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}
