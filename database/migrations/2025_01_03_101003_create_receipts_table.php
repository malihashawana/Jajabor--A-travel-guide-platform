<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReceiptsTable extends Migration
{
    public function up()
    {
        Schema::create('receipts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('flight_id')->nullable()->constrained(); // Add a foreign key to the flight table
            $table->foreignId('user_id')->constrained(); // Add a foreign key to the users table
            $table->decimal('amount', 8, 2);
            $table->timestamp('payment_date');
            $table->string('receipt_number')->unique();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('receipts');
    }
}
