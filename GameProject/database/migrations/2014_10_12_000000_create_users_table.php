<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('password');
            $table->string('email')->unique();
            $table->string('ville')->nullable()->default(null);
            $table->string('avatar')->nullable()->default(null);
            $table->boolean('connecte')->nullable()->default(null);
            $table->integer('nb-signal')->nullable()->default(0);
            $table->string('statut')->default('user');
            $table->rememberToken();
            $table->timestamps();
            $table->engine="InnoDB";
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
