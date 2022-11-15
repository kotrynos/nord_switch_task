<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    private const DEFAULT_TEMPLATE = 'base.html.twig';
    private const DEFAULT_TITLE = 'Tax calculator';

    #[Route(path: '/', name: 'home', methods: ['GET'])]
    public function __invoke(): Response
    {
        return $this->render(
            self::DEFAULT_TEMPLATE,
            [
                'title' => self::DEFAULT_TITLE,
            ],
        );
    }
}
