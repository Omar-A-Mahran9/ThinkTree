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
        Schema::create('vendors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('subscription_id')->nullable();
            $table->string('name');
            $table->string('description_ar');
            $table->string('description_en');
            $table->string('commercial_register');
            $table->bigInteger('commercial_register_number')->unique();
            $table->string('address');
            $table->string('logo');
            $table->string('cover');
            $table->bigInteger('national_id')->unique();
            $table->string('licensure');
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->string('password');
            $table->boolean('approved')->default(FALSE);
            $table->date('subscription_end_date')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendors');
    }
};
