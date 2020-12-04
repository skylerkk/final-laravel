<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CharacterInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('character_info', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('character_sheet_id');
            $table->string('player_name');
            $table->string('character_name');
            $table->integer('level');
            $table->string('race');
            $table->string('class');
            $table->string('size');
            $table->string('alignment');

            $table->foreign('character_sheet_id')->references('id')->on('character_sheet')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
    }
}
