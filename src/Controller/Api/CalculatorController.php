<?php

declare(strict_types=1);

namespace App\Controller\Api;

use App\DTO\TaxCalculationRequest;
use App\Service\TaxCalculator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CalculatorController extends AbstractController
{
    public function __construct(private readonly TaxCalculator $taxCalculator)
    {
    }

    #[Route(path: '/api/tax/calculate', name: 'api_tax_calculate', methods: ['POST'])]
    public function __invoke(Request $request): JsonResponse
    {
        $data = TaxCalculationRequest::createFromRequest($request);

        dd($this->taxCalculator->calculate($data));

        return $this->json([
            'status' => 'success',
            'tax' => $this->taxCalculator->calculate($data),
        ]);
    }
}
