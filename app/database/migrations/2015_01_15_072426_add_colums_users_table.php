<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumsUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if(Schema::hasTable('users')) {
			Schema::table('users',function(Blueprint $table){
				$table->boolean('isadmin')->after('password')->default(false);
				$table->smallInteger('role_id')->after('password')->nullable();
			});
			DB::table('users')->where('username','huzemin8')->update(array('isadmin'=>true));
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
				$table->dropColumn('isadmin');
				$table->dropColumn('role_id');
			});
		}
	}

}
