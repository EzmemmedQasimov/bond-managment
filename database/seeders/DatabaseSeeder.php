<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('bond')->insert([
            'issue_date'                        => '2021-11-08',
            'last_circulation_date'             => '2022-11-03',
            'nominal_price'                     => 100,
            'coupon_payment_frequency'          => 4,
            'interest_calculation_period'       => 360,
            'coupon_interest'                   => 10
        ]);

        DB::table('bond')->insert([
            'issue_date'                        => '2021-11-08',
            'last_circulation_date'             => '2022-11-07',
            'nominal_price'                     => 200,
            'coupon_payment_frequency'          => 4,
            'interest_calculation_period'       => 364,
            'coupon_interest'                   => 20
        ]);

        DB::table('bond')->insert([
            'issue_date'                        => '2021-11-08',
            'last_circulation_date'             => '2022-11-08',
            'nominal_price'                     => 300,
            'coupon_payment_frequency'          => 4,
            'interest_calculation_period'       => 365,
            'coupon_interest'                   => 30
        ]);
    }
}
