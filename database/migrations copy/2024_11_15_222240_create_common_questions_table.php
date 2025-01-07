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
        Schema::create('common_questions', function (Blueprint $table) {
            $table->id();
            $table->longText('question_ar');
            $table->longText('question_en');
            $table->longText('answer_ar');
            $table->longText('answer_en');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('common_questions');
    }
};
