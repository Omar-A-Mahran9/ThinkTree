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
        Schema::create('addon_services', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->longText('name_ar')->unique();
            $table->longText('name_en')->unique();
            $table->longText('description_ar');
            $table->longText('description_en');
            $table->string('price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addon_services');
    }
};
