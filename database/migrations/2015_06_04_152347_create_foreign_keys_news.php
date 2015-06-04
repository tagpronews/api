<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeysNews extends Migration
{

    public function up()
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')
                  ->onDelete('restrict')
                  ->onUpdate('cascade');
        });
        Schema::table('articles', function (Blueprint $table) {
            $table->foreign('category_id')->references('id')->on('categories')
                  ->onDelete('restrict')
                  ->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->dropForeign('articles_user_id_foreign');
        });
        Schema::table('articles', function (Blueprint $table) {
            $table->dropForeign('articles_category_id_foreign');
        });
    }
}