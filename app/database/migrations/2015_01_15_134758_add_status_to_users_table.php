<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStatusToUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if(Schema::hasTable('users')) {
			Schema::table('users',function(Blueprint $table){
				$table->smallInteger('status')->after('isadmin')->default(0);
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
		if(Schema::hasColumn('users','isadmin')) {
			Schema::table('users',function($table){
				$table->dropColumn('status');
			});
		}
	}

}
