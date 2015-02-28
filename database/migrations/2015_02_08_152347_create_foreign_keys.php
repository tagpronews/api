<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration
{

    public function up()
    {
        Schema::table('roles', function (Blueprint $table) {
            $table->foreign('inherits_from')->references('id')->on('roles');
        });
        Schema::table('roles', function (Blueprint $table) {
            $table->foreign('group_id')->references('id')->on('groups')
                ->onDelete('restrict')
                ->onUpdate('cascade');
        });
        Schema::table('permissions', function (Blueprint $table) {
            $table->foreign('role_id')->references('id')->on('roles')
                ->onDelete('restrict')
                ->onUpdate('cascade');
        });
        Schema::table('role_user', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('restrict')
                ->onUpdate('cascade');
        });
        Schema::table('role_user', function (Blueprint $table) {
            $table->foreign('role_id')->references('id')->on('roles')
                ->onDelete('restrict')
                ->onUpdate('cascade');
        });
        Schema::table('permission_role', function (Blueprint $table) {
            $table->foreign('permission_id')->references('id')->on('permissions')
                ->onDelete('restrict')
                ->onUpdate('cascade');
        });
        Schema::table('permission_role', function (Blueprint $table) {
            $table->foreign('role_id')->references('id')->on('roles')
                ->onDelete('restrict')
                ->onUpdate('cascade');
        });
        Schema::table('tokens', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::table('roles', function (Blueprint $table) {
            $table->dropForeign('roles_inherits_from_foreign');
        });
        Schema::table('roles', function (Blueprint $table) {
            $table->dropForeign('roles_group_id_foreign');
        });
        Schema::table('permissions', function (Blueprint $table) {
            $table->dropForeign('permissions_role_id_foreign');
        });
        Schema::table('role_user', function (Blueprint $table) {
            $table->dropForeign('role_user_user_id_foreign');
        });
        Schema::table('role_user', function (Blueprint $table) {
            $table->dropForeign('role_user_role_id_foreign');
        });
        Schema::table('permission_role', function (Blueprint $table) {
            $table->dropForeign('permission_role_permission_id_foreign');
        });
        Schema::table('permission_role', function (Blueprint $table) {
            $table->dropForeign('permission_role_role_id_foreign');
        });
        Schema::table('tokens', function (Blueprint $table) {
            $table->dropForeign('tokens_user_id_foreign');
        });
    }
}