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
        Schema::table('gallaries', function (Blueprint $table) {
                 $table->unsignedBigInteger('addon_service_id')->nullable(); // Add the new column
    
                // Foreign key constraint
                $table->foreign('addon_service_id')
                      ->references('id')
                      ->on('addon_services')
                      ->onDelete('cascade'); 
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('gallaries', function (Blueprint $table) {
            //
        });
    }
};
