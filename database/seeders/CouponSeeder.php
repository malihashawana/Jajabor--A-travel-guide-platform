<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class CouponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();

        DB::table('coupons')->insert([
            [
                'code' => 'DISCOUNT10',
                'discount_type' => 'percentage',
                'discount_value' => 10.00,
                'expiration_date' => $now->addDays(30),
                'status' => 'active',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'code' => 'FLAT50',
                'discount_type' => 'flat',
                'discount_value' => 50.00,
                'expiration_date' => $now->addDays(15),
                'status' => 'active',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'code' => 'SUMMER25',
                'discount_type' => 'percentage',
                'discount_value' => 25.00,
                'expiration_date' => $now->addDays(60),
                'status' => 'active',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'code' => 'EXPIRED15',
                'discount_type' => 'percentage',
                'discount_value' => 15.00,
                'expiration_date' => $now->subDays(10), // Expired coupon
                'status' => 'expired',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'code' => 'NEWYEAR2024',
                'discount_type' => 'flat',
                'discount_value' => 100.00,
                'expiration_date' => $now->addDays(90),
                'status' => 'active',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }
}
