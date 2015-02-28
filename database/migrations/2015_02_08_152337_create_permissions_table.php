<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePermissionsTable extends Migration {

	public function up()
	{
		Schema::create('permissions', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name')->unique();
			$table->string('display_name');
            $table->integer('role_id')->unsigned();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('permissions');
	}
}