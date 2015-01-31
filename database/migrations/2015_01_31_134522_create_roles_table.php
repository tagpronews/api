<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->boolean('locked')->default(false);
            $table->integer('parent')->unsigned();
            $table->integer('group_id')->unsigned();
            $table->timestamps();

            $table->foreign('parent')->references('id')->on('roles');
            $table->foreign('group_id')->references('id')->on('groups');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('roles', function (Blueprint $table) {
            $table->dropForeign('roles_parent_foreign');
            $table->dropForeign('roles_group_id_foreign');
        });

        Schema::drop('roles');
    }

}
