<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('player_management', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('category');
            $table->string('pos');
            $table->string('opp');
            $table->string('fpts');
            $table->string('sal');
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
        Schema::dropIfExists('player_management');
    }
};
