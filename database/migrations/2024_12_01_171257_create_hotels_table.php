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
        Schema::create('hotels', function (Blueprint $table) {
            $table->id();
            $table->string('name');        // Hotel name
            $table->string('location');    // Hotel location
            $table->decimal('latitude', 10, 8)->nullable();  // Latitude for the hotel
            $table->decimal('longitude', 11, 8)->nullable(); // Longitude for the hotel
            $table->json('images')->nullable();              // Store multiple image file paths as JSON
            $table->decimal('price', 8, 2); // Add price column (8 digits in total, 2 after the decimal point)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotels');
    }
};
