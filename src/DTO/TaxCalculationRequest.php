<?php

declare(strict_types=1);

namespace App\DTO;

use Symfony\Component\HttpFoundation\Request;

class TaxCalculationRequest
{
    private ?int $yearlyIncome;
    private ?int $taxExemption;
    private ?int $additionalIncome;

    public function __construct(
        ?int $yearlyIncome,
        ?int $taxExemption,
        ?int $additionalIncome,
    ) {
        $this->yearlyIncome = $yearlyIncome;
        $this->taxExemption = $taxExemption;
        $this->additionalIncome = $additionalIncome;
    }

    public function getYearlyIncome(): ?int
    {
        return $this->yearlyIncome;
    }

    public function getTaxExemption(): ?int
    {
        return $this->taxExemption;
    }

    public function getAdditionalIncome(): ?int
    {
        return $this->additionalIncome;
    }

    public static function createFromRequest(Request $request): self
    {
        return new self(
            (int) $request->get('yearly_income'),
            (int) $request->get('tax_exemption'),
            (int) $request->get('additional_income'),
        );
    }
}
