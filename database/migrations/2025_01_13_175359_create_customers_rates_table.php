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
        Schema::create('customers_rates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('child_id');
            $table->foreign('child_id')->references('id')->on('chields');
            $table->integer('rate')->default(5); // Set default to 5
            $table->longText('comment'); // Set default to 5
            $table->enum('status', ['approve', 'reject','pending'])->default('pending'); // Define enum with a default value
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers_rates');
    }
};
