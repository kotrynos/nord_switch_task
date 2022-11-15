<?php

declare(strict_types=1);

namespace App\Validator;

use App\DTO\TaxCalculationRequest;
use App\Exception\InvalidValueProvidedException;

class TaxCalculationRequestValidator
{
    /**
     * @throws InvalidValueProvidedException
     */
    public function validate(TaxCalculationRequest $request): void
    {
        if (
            !$this->isDefinedAndNotNegative($request->getTaxExemption())
            || !$this->isDefinedAndNotNegative($request->getAdditionalIncome())
            || !$this->isDefinedAndNotNegative($request->getYearlyIncome())
        ) {
            throw new InvalidValueProvidedException('Invalid value provided');
        }
    }

    private function isDefinedAndNotNegative(int $value): bool
    {
        return $value < 0;
    }
}