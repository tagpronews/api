<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	public function up()
	{
		Schema::create('users', function(Blueprint $table) {
			$table->increments('id');
			$table->string('username', 50)->unique();
			$table->string('email', 255)->unique();
			$table->string('password', 255);
			$table->string('avatar', 255);
            $table->rememberToken();
			$table->string('confirmation_code', 64);
			$table->boolean('confirmed')->default(false);
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('users');
	}
}