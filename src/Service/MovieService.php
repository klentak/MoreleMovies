<?php

declare(strict_types=1);

namespace App\Service;

use App\Repository\MovieRepository;

class MovieService
{
    public function __construct(
        private readonly MovieRepository $movieRepository
    ) {
    }

    public function getThreeRandomMovies(): array
    {
        $result = [];
        $movies = $this->movieRepository->getAll();

        if (count($movies) <= 3) {
            return $movies;
        }

        foreach (array_rand($movies, 3) as $index) {
            $result[] = $movies[$index];
        }

        return $result;
    }
}
