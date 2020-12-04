<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CharacterStats extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('character_stats', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('character_sheet_id');
            $table->integer('str');
            $table->integer('dex');
            $table->integer('con');
            $table->integer('int');
            $table->integer('wil');
            $table->integer('cha');

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
        //
    }
}
