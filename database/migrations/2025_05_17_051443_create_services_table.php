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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name', 100);
            $table->string('phone', 100);
            $table->string('chassis_number', 100);
            $table->string('km_run', 100);
            $table->string('bay_number', 100);
            $table->string('service_charge', 100);
            $table->string('service_type', 100);
            $table->string('start_date', 100);
            $table->string('end_date', 100)->nullable();
            $table->string('image', 100)->nullable();
            $table->string('remarks', 100)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
