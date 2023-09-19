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

    public function getThreeRandomMovieTitles(): array
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

    public function getMovieTitlesStartingWithWAndHavingEvenLength(): array
    {
        $result = array_filter($this->movieRepository->getAll(), function (string $value): bool {
            $lowerCaseMovieTitle = mb_strtolower($value);

            return str_starts_with($lowerCaseMovieTitle, 'w') && mb_strlen($lowerCaseMovieTitle) % 2 === 0;
        });

        // Can be omitted, but I like the keys to be in place :)
        return [...$result];
    }

    public function getMovieTitlesConsistingMoreThanOneWord(): array
    {
        $result =  array_filter($this->movieRepository->getAll(), function (string $value): bool {
            return count(preg_split('/\s+/u', $value, -1, PREG_SPLIT_NO_EMPTY)) > 1;
        });

        // Can be omitted, but I like the keys to be in place :)
        return [...$result];
    }
}
