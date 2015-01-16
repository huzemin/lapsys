<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddImageToUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if(Schema::hasTable('users')) {
			Schema::table('users',function(Blueprint $table){
				$table->string('image', 250)->after('isadmin')->default('/uploads/avatars/default.png');
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
				$table->dropColumn('image');
			});
		}
	}

}
