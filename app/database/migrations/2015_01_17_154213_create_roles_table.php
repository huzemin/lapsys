<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if(!Schema::hasTable('roles')) {
			Schema::create('roles', function(Blueprint $table) {
				$table->increments('id',5);
				$table->string('role_name',30)->uniqid();
				$table->text('auth');
				$table->smallInteger('status');
				$table->text('backup')->nullable();
				$table->integer('updated_user');
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
		if(Schema::hasTable('roles')){
			Schema::drop('roles');
		}
	}

}
