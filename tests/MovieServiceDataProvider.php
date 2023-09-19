<?php

declare(strict_types=1);

namespace App\Tests;

use Generator;

class MovieServiceDataProvider
{
    public function provideMovies(): Generator
    {
        yield [
            [
                'Pulp Fiction',
                'Incepcja',
                'Skazani na Shawshank',
                'Dwunastu gniewnych ludzi',
                'Ojciec chrzestny',
                'Django',
                'Matrix',
                'Leon zawodowiec',
                'Siedem',
                'Nietykalni',
                'Władca Pierścieni: Powrót króla',
                'Fight Club',
                'Forrest Gump',
                'Chłopaki nie płaczą',
                'Gladiator',
                'Człowiek z blizną',
                'Pianista',
                'Doktor Strange',
                'Szeregowiec Ryan',
                'Lot nad kukułczym gniazdem',
                'Wielki Gatsby',
                'Avengers: Wojna bez granic',
                'Życie jest piękne',
            ],
        ];
    }

    public function provideTooFewMovies(): Generator
    {
        yield [
            [
                'Pulp Fiction',
                'Incepcja',
            ],
        ];
    }

    public function provideMoviesForTestsStartingWithWAndHavingEvenTitleLength(): Generator
    {
        yield [
            'movies' => [
                'źżćć',
                'Wżćś',
                'źWćć',
                'wżźć',
            ],
            'result' => [
                'Wżćś',
                'wżźć',
            ]
        ];
        yield [
            'movies' => [
                'WWżćć',
                'WWźćć',
                'Wżćś',
                'wżźć',
            ],
            'result' => [
                'Wżćś',
                'wżźć',
            ]
        ];
        yield [
            'movies' => [
                'żżżżż',
                'ććććć',
                'ąąąąą',
                'aaaaa',
            ],
            'result' => []
        ];
        yield [
            'movies' => [],
            'result' => [],
        ];
    }

    public function provideMoviesForConsistingMoreThanOneWord(): Generator
    {
        yield [
            'movies' => [
                'Test',
                'Test Test',
                'Test Test Test',
                'Test​Test',
                'Test Test',
                'Test Test',
                'Test Test',
                'Test Test',
                'Test Test',
                'Test Test',
                'Test Test',
                'Test Test',
                'Test Test',
                'Test👨🏻‍🚀Test',
                'Test​',
                'Test ',
                'Test ',
                'Test ',
                'Test ',
                'Test ',
                'Test ',
                'Test ',
                'Test ',
                'Test ',
                'Test👨🏻‍🚀',
            ],
            'result' => [
                'Test Test',
                'Test Test Test',
                'Test Test',
                'Test Test',
                'Test Test',
                'Test Test',
                'Test Test',
                'Test Test',
                'Test Test',
                'Test Test',
                'Test Test',
            ]
        ];
        yield [
            'movies' => [
                'Szczęki',
                'Incepcja',
                'Skazani na Shawshank',
                'Dwunastu gniewnych ludzi',
            ],
            'result' => [
                'Skazani na Shawshank',
                'Dwunastu gniewnych ludzi',
            ]
        ];
    }

}
