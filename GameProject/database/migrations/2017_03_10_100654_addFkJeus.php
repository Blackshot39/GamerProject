<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkJeus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('jeus', function (Blueprint $table) {
            $table->integer('type_jeu_id')->unsigned();
            $table->foreign('type_jeu_id')->references('id')->on('type_jeus');
            $table->engine = "InnoDB";
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
