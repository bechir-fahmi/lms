<?php

namespace Modules\Currency\database\seeders;

use Illuminate\Database\Seeder;
use Modules\Currency\app\Models\MultiCurrency;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (! MultiCurrency::first()) {
            // USD - Default currency
            $currency = new MultiCurrency();
            $currency->currency_name = '$-USD';
            $currency->country_code = 'US';
            $currency->currency_code = 'USD';
            $currency->currency_icon = '$';
            $currency->is_default = 'yes';
            $currency->currency_rate = 1;
            $currency->currency_position = 'before_price';
            $currency->status = 'active';
            $currency->save();

            // EUR - Euro
            $currency = new MultiCurrency();
            $currency->currency_name = '€-EUR';
            $currency->country_code = 'EU';
            $currency->currency_code = 'EUR';
            $currency->currency_icon = '€';
            $currency->is_default = 'no';
            $currency->currency_rate = 0.92;
            $currency->currency_position = 'before_price';
            $currency->status = 'active';
            $currency->save();

            // TND - Tunisian Dinar
            $currency = new MultiCurrency();
            $currency->currency_name = 'د.ت-TND';
            $currency->country_code = 'TN';
            $currency->currency_code = 'TND';
            $currency->currency_icon = 'د.ت';
            $currency->is_default = 'no';
            $currency->currency_rate = 3.10;
            $currency->currency_position = 'before_price';
            $currency->status = 'active';
            $currency->save();
        }
    }
}
