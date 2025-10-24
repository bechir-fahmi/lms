<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Delete all currencies except USD, EUR, and TND
        DB::table('multi_currencies')
            ->whereNotIn('currency_code', ['USD', 'EUR', 'TND'])
            ->delete();

        // Ensure USD exists and is default
        $usd = DB::table('multi_currencies')->where('currency_code', 'USD')->first();
        if (!$usd) {
            DB::table('multi_currencies')->insert([
                'currency_name' => '$-USD',
                'country_code' => 'US',
                'currency_code' => 'USD',
                'currency_icon' => '$',
                'is_default' => 'yes',
                'currency_rate' => 1,
                'currency_position' => 'before_price',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        } else {
            DB::table('multi_currencies')
                ->where('currency_code', 'USD')
                ->update([
                    'is_default' => 'yes',
                    'currency_rate' => 1,
                    'status' => 'active',
                ]);
        }

        // Ensure EUR exists
        $eur = DB::table('multi_currencies')->where('currency_code', 'EUR')->first();
        if (!$eur) {
            DB::table('multi_currencies')->insert([
                'currency_name' => '€-EUR',
                'country_code' => 'EU',
                'currency_code' => 'EUR',
                'currency_icon' => '€',
                'is_default' => 'no',
                'currency_rate' => 0.92,
                'currency_position' => 'before_price',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        } else {
            DB::table('multi_currencies')
                ->where('currency_code', 'EUR')
                ->update([
                    'is_default' => 'no',
                    'status' => 'active',
                ]);
        }

        // Ensure TND exists
        $tnd = DB::table('multi_currencies')->where('currency_code', 'TND')->first();
        if (!$tnd) {
            DB::table('multi_currencies')->insert([
                'currency_name' => 'د.ت-TND',
                'country_code' => 'TN',
                'currency_code' => 'TND',
                'currency_icon' => 'د.ت',
                'is_default' => 'no',
                'currency_rate' => 3.10,
                'currency_position' => 'before_price',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        } else {
            DB::table('multi_currencies')
                ->where('currency_code', 'TND')
                ->update([
                    'is_default' => 'no',
                    'status' => 'active',
                ]);
        }

        // Make sure no other currency is set as default
        DB::table('multi_currencies')
            ->where('currency_code', '!=', 'USD')
            ->update(['is_default' => 'no']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // This migration is not reversible as we're deleting data
    }
};
