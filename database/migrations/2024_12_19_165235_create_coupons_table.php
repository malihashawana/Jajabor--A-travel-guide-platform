<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique(); // Unique coupon code
            $table->enum('discount_type', ['percentage', 'flat']); // Discount type
            $table->decimal('discount_value', 8, 2); // Discount value
            $table->dateTime('expiration_date'); // Expiration date
            $table->enum('status', ['active', 'expired'])->default('active'); // Coupon status
            $table->timestamps(); // Created and updated timestamps
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coupons');
    }
}
