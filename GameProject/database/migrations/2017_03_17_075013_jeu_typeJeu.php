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
         Schemo::create('jeu_typejeu', function(Blueprint $table){
            $table->increments('id');
            
            $table->integer('jeu_id')->unsigned();
            $table->foreign('jeu_id')->references('id')->on('jeus');
            $table->integer('typejeu_id')->unsigned();
            $table->foreign('typejeu_id')->references('id')->on('type_jeus');
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
