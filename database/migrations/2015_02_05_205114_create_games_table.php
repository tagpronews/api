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
			$table->foreign('round_id')->references('id')->on('rounds')->onDelete('cascade');
			$table->integer('map_id')->unsigned()->default(0);
			$table->foreign('map_id')->references('id')->on('maps')->onDelete('cascade');
			$table->integer('home_entry_id')->unsigned()->default(0);
			$table->foreign('home_entry_id')->references('id')->on('entries')->onDelete('cascade');
			$table->integer('away_entry_id')->unsigned()->default(0);
			$table->foreign('away_entry_id')->references('id')->on('entries')->onDelete('cascade');
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
