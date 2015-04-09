<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGamesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('games', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('round_id')->unsigned()->default(0);
			$table->integer('map_id')->unsigned()->default(0);
			$table->integer('home_entry_id')->unsigned()->default(0);
			$table->integer('away_entry_id')->unsigned()->default(0);
			$table->dateTime('start_datetime');
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
		Schema::drop('games');
	}

}
