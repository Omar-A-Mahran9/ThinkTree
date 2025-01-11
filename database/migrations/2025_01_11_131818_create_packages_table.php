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
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('name_ar')->unique();
            $table->string('name_en')->unique();
            $table->text('description_ar'); // LongText changed to Text for optimization
            $table->text('description_en');
            $table->decimal('price', 10, 2); // Decimal for price to support precision
            $table->decimal('discount_price', 10, 2)->nullable(); // Nullable if no discount
            $table->boolean('have_discount')->default(false); // Boolean for true/false discount
            $table->decimal('price_per_session', 10, 2)->nullable(); // Nullable if price per session isn't applicable
            $table->integer('duration_monthly'); // Integer for numeric values
            $table->integer('number_of_session_per_week');
            $table->integer('number_of_levels');
            $table->integer('number_of_sessions');
            $table->string('image')->nullable(); // Nullable if no image provided
            $table->boolean('featured')->default(false);
            $table->boolean('available')->default(true);


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};
