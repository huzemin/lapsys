<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// create users table
		if(!Schema::hasTable('users')){
			Schema::create('users', function(Blueprint $table) {
				$table->increments('id');
				$table->string('username', 50)->unique();
				$table->string('name', 50);
				$table->string('email')->unique();
				$table->string('password',100);
				$table->boolean('isadmin')->default(false);
				$table->smallInteger('role_id');
				$table->string('loginip', 25);
				$table->integer('loginnum');
				$table->string('loginserve',200);
				$table->string('remember_token',100);
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
		// drop (delete) table users -- use command :php artisan migrate:rollback
		Schema::drop('users');
	}

}
