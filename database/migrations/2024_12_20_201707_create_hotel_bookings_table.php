<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelBookingsTable extends Migration
{
    public function up()
    {
        Schema::create('hotel_bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Reference to the users table
            $table->unsignedBigInteger('hotel_id'); // Reference to the hotels table
            $table->date('check_in_date');
            $table->date('check_out_date');
            $table->integer('number_of_guests');
            $table->string('bedroom_type')->nullable()->comment('Type of bedroom');
            $table->timestamps();

            // Remove foreign key constraints for flexibility
            // You may add indexes to improve query performance, if needed
            $table->index('user_id');
            $table->index('hotel_id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('hotel_bookings');
    }
}
