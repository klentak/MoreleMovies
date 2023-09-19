<?php

declare(strict_types=1);

namespace App\Controller;

use App\Service\MovieService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/movie', name: 'movie.')]
class MovieController extends AbstractController
{
    public function __construct(
        private readonly MovieService $movieService
    ) {
    }

    #[Route('/random-three', name: 'random-three', methods: [Request::METHOD_GET])]
    public function getThreeRandomMovieTitles(): JsonResponse
    {
        return new JsonResponse(
            $this->movieService->getThreeRandomMovieTitles()
        );
    }

    #[
        Route(
            '/starting-with-w-and-having-even-title-length',
            name: 'starting-with-w-and-having-even-title-length',
            methods: [Request::METHOD_GET]
        )
    ]
    public function getMovieTitlesStartingWithWAndHavingEvenLength(): JsonResponse
    {
        return new JsonResponse(
            $this->movieService->getMovieTitlesStartingWithWAndHavingEvenLength()
        );
    }

    #[Route('/containing-more-than-one-word', name: 'containing-more-than-one-word', methods: [Request::METHOD_GET])]
    public function getMovieTitlesConsistingMoreThanOneWord(): JsonResponse
    {
        return new JsonResponse(
            $this->movieService->getMovieTitlesConsistingMoreThanOneWord()
        );
    }
}
