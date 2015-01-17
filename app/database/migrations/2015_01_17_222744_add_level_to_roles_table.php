<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLevelToRolesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{	
		if(Schema::hasTable('roles')) {
			Schema::table('roles',function(Blueprint $table){
				$table->smallInteger('level')->after('role_name')->default(0);
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
		if(Schema::hasColumn('roles','level')) {
			Schema::table('roles',function($table){
				$table->dropColumn('level');
			});
		}
	}

}
