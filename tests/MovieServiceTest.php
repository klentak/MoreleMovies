<?php

declare(strict_types=1);

namespace App\Tests;

use App\Repository\MovieRepository;
use App\Service\MovieService;
use PHPUnit\Framework\TestCase;

class MovieServiceTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->movieRepository = $this->createStub(MovieRepository::class);
        $this->movieService = new MovieService(
            $this->movieRepository
        );
    }

    /**
     * @dataProvider App\Tests\MovieServiceDataProvider::provideMovies()
     */
    public function testRandomThreeMovies(array $movies): void
    {
        $this->movieRepository->method('getAll')->willReturn(
            $movies
        );

        $this->assertCount(
            3,
            $this->movieService->getThreeRandomMovieTitles()
        );
    }

    /**
     * @dataProvider App\Tests\MovieServiceDataProvider::provideTooFewMovies()
     */
    public function testRandomThreeMoviesWithTooFewData(array $movies): void
    {
        $this->movieRepository->method('getAll')->willReturn(
            $movies
        );

        $result = $this->movieService->getThreeRandomMovieTitles();

        $this->assertCount(
            2,
            $result
        );
        $this->assertSame(
            $result,
            $movies
        );
    }

    /**
     * @dataProvider App\Tests\MovieServiceDataProvider::provideMoviesForTestsStartingWithWAndHavingEvenTitleLength()
     */
    public function testMoviesStartingWithWAndHavingEvenTitleLength(array $movies, array $result): void
    {
        $this->movieRepository->method('getAll')->willReturn(
            $movies
        );

        $this->assertEquals(
            $result,
            $this->movieService->getMovieTitlesStartingWithWAndHavingEvenLength()
        );
    }

    /**
     * @dataProvider App\Tests\MovieServiceDataProvider::provideMoviesForConsistingMoreThanOneWord()
     */
    public function testMovieTitlesConsistingMoreThanOneWord(array $movies, array $result): void
    {
        $this->movieRepository->method('getAll')->willReturn(
            $movies
        );

        $this->assertEquals(
            $result,
            $this->movieService->getMovieTitlesConsistingMoreThanOneWord()
        );
    }
}
