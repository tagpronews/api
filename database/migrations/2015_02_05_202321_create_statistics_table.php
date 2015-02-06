<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatisticsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('statistics', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('player_id')->unsigned()->default(0);
			// Cascading on delete may not be desirable, since it may affect game results
			$table->foreign('player_id')->references('id')->on('players')->onDelete('cascade');
			$table->integer('period_id')->unsigned()->default(0);
			$table->foreign('period_id')->references('id')->on('periods')->onDelete('cascade');
			$table->decimal('minutes')->unsigned()->default(0);
			$table->integer('plus_minus')->default(0);
			$table->integer('score')->default(0);
			$table->integer('tags')->unsigned()->default(0);
			$table->integer('pops')->unsigned()->default(0);
			$table->integer('grabs')->unsigned()->default(0);
			$table->integer('drops')->unsigned()->default(0);
			$table->integer('hold')->unsigned()->default(0);
			$table->integer('captures')->unsigned()->default(0);
			$table->integer('prevent')->unsigned()->default(0);
			$table->integer('returns')->unsigned()->default(0);
			$table->integer('support')->unsigned()->default(0);
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
		Schema::drop('statistics');
	}

}
