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
        Schema::create('bond', function (Blueprint $table) {
            $table->id('id_bond');
            $table->date('issue_date');
            $table->date('last_circulation_date');
            $table->integer('nominal_price');
            $table->integer('coupon_payment_frequency');
            $table->integer('interest_calculation_period');
            $table->integer('coupon_interest');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bond');
    }
};
