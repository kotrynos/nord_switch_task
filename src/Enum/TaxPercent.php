<?php

declare(strict_types=1);

namespace App\Enum;

class TaxPercent
{
    public const MIN_TAX = 0.20;
    public const MAX_TAX = 0.25;

    /**
     * Do Not Instantiate This Class
     */
    public function __construct()
    {
    }
}
