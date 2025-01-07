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
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->string('name_ar')->unique();
            $table->string('name_en')->unique();
            $table->string('description_ar');
            $table->string('image');
            $table->string('description_en');
            $table->unsignedBigInteger('addon_service_id')->nullable();
            // Foreign key constraint.
            $table->foreign('addon_service_id')
            ->references('id')
            ->on('addon_services')
            ->onDelete('cascade'); 
                       $table->double('price');
            $table->enum('status', ['Pending', 'Rejected', 'Approved']);
            $table->string('meta_tag_key_words')->nullable();
            $table->string('meta_tag_key_description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offers');
    }
};
