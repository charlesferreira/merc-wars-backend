<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMercsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mercs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('player_id');
            $table->string('name')->nullable();

            $table->integer('color');
            $table->integer('head');

            $table->unsignedInteger('weapon_id')->nullable();
            $table->unsignedInteger('trunk_id')->nullable();
            $table->unsignedInteger('legs_id')->nullable();
            $table->unsignedInteger('hand_id')->nullable();
            $table->unsignedInteger('feet_id')->nullable();
            $table->unsignedInteger('headgear_id')->nullable();

            $table->integer('defense');
            $table->integer('agility');
            $table->integer('force');

            $table->integer('stamina')->default(0);
            $table->integer('hiring_count')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mercs');
    }
}
