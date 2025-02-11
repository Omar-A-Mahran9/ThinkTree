<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('our_numbers', function (Blueprint $table) {
            $table->id();
            $table->string("Parents_experiment");
            $table->string("Traning_houres");
            $table->string("Our_heroes");
            $table->string("Heroes_rate");
            $table->string("Lessons");
            $table->string("Puzzles");
            $table->string("Stars");
            $table->string("Online");
            $table->string("Kids_Played");
            $table->string("Games");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('our_numbers');
    }
};
