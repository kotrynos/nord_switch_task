<?php

declare(strict_types=1);

namespace App\Service;

use App\DTO\TaxCalculationRequest;
use App\Enum\Income;
use App\Enum\TaxPercent;

class TaxCalculator
{
    public function calculate(TaxCalculationRequest $taxModel): float
    {
        $income = $this->calculateIncome($taxModel);

        if ($income >= Income::DEFAULT) {
            return $income * TaxPercent::MAX_TAX;
        }

        return $income * TaxPercent::MIN_TAX;
    }

    private function calculateIncome(TaxCalculationRequest $request): int
    {
        return $request->getYearlyIncome() + $request->getAdditionalIncome() - $request->getTaxExemption();
    }
}