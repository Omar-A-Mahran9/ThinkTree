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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id')->references('id')->on('customers');

            $table->unsignedBigInteger('chield_id');
            $table->foreign('chield_id')->references('id')->on('chields');
           
            $table->unsignedBigInteger('package_id')->nullable();
            $table->foreign('package_id')->references('id')->on('packages');
        
            $table->unsignedBigInteger('day_id')->nullable();
            $table->foreign('day_id')->references('id')->on('days');
 
            $table->unsignedBigInteger('group_id')->nullable();
            $table->foreign('group_id')->references('id')->on('groups');
 

            $table->unsignedBigInteger('time_id')->nullable();
            $table->foreign('time_id')->references('id')->on('times');

            $table->boolean('Choose_duration_later')->default(false); // Availability of the group, true by default

            $table->enum('Payment_statue', ["Pending",'Paid', 'Rejected'])->default("Pending"); // Define enum and make it unique
            
            $table->string('price');

            // $table->enum('type_of_pay', ["Card",'Paid', 'Rejected'])->default("Pending"); // Define enum and make it unique


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
