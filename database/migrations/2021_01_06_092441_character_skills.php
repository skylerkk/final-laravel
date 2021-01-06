<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CharacterSkills extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('character_skills', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('character_sheet_id');
            $table->integer('athletics');
            $table->integer('acrobatics');
            $table->integer('sleightofhand');
            $table->integer('stealth');
            $table->integer('arcana');
            $table->integer('history');
            $table->integer('investigation');
            $table->integer('nature');
            $table->integer('religion');
            $table->integer('animalhandling');
            $table->integer('insight');
            $table->integer('medicine');
            $table->integer('perception');
            $table->integer('survival');
            $table->integer('deception');
            $table->integer('intimidation');
            $table->integer('performance');
            $table->integer('persuasion');

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
