<?php

use App\Enums\OrderStatus;
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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('city_id');
            $table->unsignedBigInteger('addon_service_id') ;
            // Foreign key constraint.
            $table->date('date');
            $table->string('description');
            $table->string('address');

           
            $table->integer('status')->comment('App\Enums\OrderStatus')->default(OrderStatus::OrderPlaced->value);
            $table->foreign('city_id')->references('id')->on('cities');
            $table->foreign('customer_id')->references('id')->on('customers');

            $table->foreign('addon_service_id')
            ->references('id')
            ->on('addon_services')
            ->onDelete('cascade'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
