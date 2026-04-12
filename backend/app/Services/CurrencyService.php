<?php

namespace App\Services;

class CurrencyService
{
    // 1 EUR ≈ 655.957 FCFA (taux fixe XOF/EUR)
    const EUR_RATE = 655.957;

    public static function fcfaToEur(float $fcfa): float
    {
        return round($fcfa / self::EUR_RATE, 2);
    }

    public static function eurToFcfa(float $eur): float
    {
        return round($eur * self::EUR_RATE);
    }
}
