<?php

declare(strict_types=1);

namespace App\Controller\Api;

use App\DTO\TaxCalculationRequest;
use App\Exception\InvalidValueProvidedException;
use App\Service\TaxCalculator;
use App\Validator\TaxCalculationRequestValidator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CalculatorController extends AbstractController
{
    public function __construct(
        private readonly TaxCalculator $taxCalculator,
        private readonly TaxCalculationRequestValidator $validator,
    ) {
    }

    #[Route(path: '/api/tax/calculate', name: 'api_tax_calculate', methods: ['POST'])]
    public function __invoke(Request $request): JsonResponse
    {
        $data = TaxCalculationRequest::createFromRequest($request);

        try {
            $this->validator->validate($data);
        } catch (InvalidValueProvidedException) {
            return $this->json([
                'status' => 'error',
                'message' => 'Invalid value provided',
            ]);
        }

        return $this->json([
            'status' => 'success',
            'message' => $this->taxCalculator->calculate($data),
        ]);
    }
}
