<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('members', function(Blueprint $table)
		{
			//TODO: Maybe specify a position (O, D, O/D, D/O, Both)
			$table->increments('id');
			$table->integer('player_id')->unsigned()->default(0);
			$table->foreign('player_id')->references('id')->on('players')->onDelete('cascade');
			$table->integer('entry_id')->unsigned()->default(0);
			$table->foreign('entry_id')->references('id')->on('entries')->onDelete('cascade');
			$table->boolean('entry_captain')->default(false);
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('members');
	}

}
