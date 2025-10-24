<?php

namespace Modules\Currency\app\Enums;

enum AllCurrencyEnum: string {

    public static function getAll(): array {
        $all_currency = [
            'USD' => 'United States Dollar',
            'EUR' => 'Euro',
            'TND' => 'Tunisian Dinar',
        ];

        return $all_currency;
    }
}
