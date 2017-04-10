<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class JeuTypeJeu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
         Schema::create('jeu_type_jeu', function(Blueprint $table){
            $table->increments('id');
            
            $table->integer('jeu_id')->unsigned();
            $table->foreign('jeu_id')->references('id')->on('jeus');
            $table->integer('type_jeu_id')->unsigned();
            $table->foreign('type_jeu_id')->references('id')->on('type_jeus');
            $table->engine='InnoDB';
        });
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
