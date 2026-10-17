<?php
/* Sample catalogue for the preview build. In the full build this lives in MySQL. */

const GENRES = [
    'street-fighting' => 'Street Fighting',
    'martial-arts' => 'Martial Arts',
    'gang-wars' => 'Gang Wars',
    'revenge' => 'Revenge',
    'underground-racing' => 'Underground Racing',
    'tournaments' => 'Tournaments',
    'dystopian' => 'Dystopian',
    'grindhouse-classics' => 'Grindhouse Classics',
];

const MOVIES = [
    1 => ['id' => 1, 'title' => 'Concrete Knuckles', 'tagline' => 'Eleven floors. One way out.', 'synopsis' => 'An ex-bouncer fights his way up eleven floors of an abandoned parking structure, where every level has a new champion and a new set of rules.', 'year' => 2024, 'runtime' => 104, 'rating' => 'R', 'director' => 'Mara Voss', 'price' => 12.99, 'genre_slug' => 'street-fighting', 'genre' => 'Street Fighting', 'featured' => true],
    2 => ['id' => 2, 'title' => 'Basement Rules', 'tagline' => 'No ref. No bell.', 'synopsis' => 'Rent is due, so Marisol steps into a basement ring where the only rule is that nobody calls a referee.', 'year' => 2019, 'runtime' => 96, 'rating' => 'R', 'director' => 'Dez Okafor', 'price' => 9.99, 'genre_slug' => 'street-fighting', 'genre' => 'Street Fighting', 'featured' => false],
    3 => ['id' => 3, 'title' => 'Iron Lotus Alley', 'tagline' => 'Behind the laundromat, the last dojo.', 'synopsis' => 'A dojo hidden behind a laundromat is the last thing standing between a neighborhood and the crew that wants it gone.', 'year' => 2021, 'runtime' => 112, 'rating' => 'R', 'director' => 'Kenji Arata', 'price' => 11.99, 'genre_slug' => 'martial-arts', 'genre' => 'Martial Arts', 'featured' => true],
    4 => ['id' => 4, 'title' => 'Palm and Pavement', 'tagline' => 'Learn it on the rooftops.', 'synopsis' => 'A courier with a broken wrist and a sharp memory learns the old forms from a street vendor, one rooftop at a time.', 'year' => 2016, 'runtime' => 99, 'rating' => 'PG-13', 'director' => 'Lin Mei Cho', 'price' => 8.99, 'genre_slug' => 'martial-arts', 'genre' => 'Martial Arts', 'featured' => false],
    5 => ['id' => 5, 'title' => 'The Crane Lane Tournament', 'tagline' => 'Sixteen in. One out.', 'synopsis' => 'Sixteen fighters, one condemned tram depot, and a purse that nobody can quite explain.', 'year' => 2013, 'runtime' => 118, 'rating' => 'R', 'director' => 'Tomas Heller', 'price' => 9.99, 'genre_slug' => 'tournaments', 'genre' => 'Tournaments', 'featured' => false],
    6 => ['id' => 6, 'title' => 'Eight Rounds to Rust', 'tagline' => 'She came back under another name.', 'synopsis' => 'A retired champion enters a tournament under a fake name to find out who sold her last fight.', 'year' => 2022, 'runtime' => 107, 'rating' => 'R', 'director' => 'Nia Calder', 'price' => 11.99, 'genre_slug' => 'tournaments', 'genre' => 'Tournaments', 'featured' => false],
    7 => ['id' => 7, 'title' => 'Sixth Ward', 'tagline' => 'Friday is coming.', 'synopsis' => 'Two crews share one block and one truce. The truce expires Friday.', 'year' => 2018, 'runtime' => 121, 'rating' => 'R', 'director' => 'Ray Delacroix', 'price' => 10.99, 'genre_slug' => 'gang-wars', 'genre' => 'Gang Wars', 'featured' => false],
    8 => ['id' => 8, 'title' => 'Ash and Gasoline', 'tagline' => 'The list is short. The night is long.', 'synopsis' => 'After the fire at the depot, one woman has a list, a jerry can, and nothing left to lose.', 'year' => 2023, 'runtime' => 109, 'rating' => 'R', 'director' => 'Mara Voss', 'price' => 12.99, 'genre_slug' => 'revenge', 'genre' => 'Revenge', 'featured' => true],
    9 => ['id' => 9, 'title' => 'Debt Collector of Pier Nine', 'tagline' => 'Every debt gets collected.', 'synopsis' => 'A quiet man collects debts for the harbor syndicate until the day his own name is on the ledger.', 'year' => 2020, 'runtime' => 101, 'rating' => 'R', 'director' => 'Silas Brandt', 'price' => 9.99, 'genre_slug' => 'revenge', 'genre' => 'Revenge', 'featured' => false],
    10 => ['id' => 10, 'title' => 'Redline Rats', 'tagline' => 'Built in a tunnel. Raced in the dark.', 'synopsis' => 'A crew of teenage mechanics builds a car in a drainage tunnel and takes on the city after dark.', 'year' => 2022, 'runtime' => 98, 'rating' => 'PG-13', 'director' => 'Jo Park', 'price' => 10.99, 'genre_slug' => 'underground-racing', 'genre' => 'Underground Racing', 'featured' => false],
    11 => ['id' => 11, 'title' => 'Midnight Clutch', 'tagline' => 'The clutch will not make it.', 'synopsis' => 'Eighty miles of closed highway, one clutch that is going to fail, and a rival with nothing to prove.', 'year' => 1992, 'runtime' => 94, 'rating' => 'R', 'director' => 'Hank Moreau', 'price' => 6.99, 'genre_slug' => 'underground-racing', 'genre' => 'Underground Racing', 'featured' => false],
    12 => ['id' => 12, 'title' => 'Neon Gutter', 'tagline' => 'Daylight costs extra.', 'synopsis' => 'In a city that taxes daylight, an unlicensed brawler becomes the face of a rebellion she never wanted.', 'year' => 2025, 'runtime' => 114, 'rating' => 'R', 'director' => 'Ines Kowalski', 'price' => 13.99, 'genre_slug' => 'dystopian', 'genre' => 'Dystopian', 'featured' => true],
    13 => ['id' => 13, 'title' => 'Wire Fence Republic', 'tagline' => 'The wall is the easy part.', 'synopsis' => 'Walls go up around the old district and the people inside decide to write their own rules.', 'year' => 2017, 'runtime' => 126, 'rating' => 'R', 'director' => 'Tomas Heller', 'price' => 8.99, 'genre_slug' => 'dystopian', 'genre' => 'Dystopian', 'featured' => false],
    14 => ['id' => 14, 'title' => 'Switchblade Sundays', 'tagline' => 'Sunday never ends.', 'synopsis' => 'A knife-fighting gang, a corrupt cop, and one very long Sunday in 1984.', 'year' => 1984, 'runtime' => 91, 'rating' => 'R', 'director' => 'Vic Santangelo', 'price' => 5.99, 'genre_slug' => 'grindhouse-classics', 'genre' => 'Grindhouse Classics', 'featured' => false],
    15 => ['id' => 15, 'title' => 'Dragon Gym Dropouts', 'tagline' => 'Failing grade. Perfect kick.', 'synopsis' => 'Three dropouts, one failing kung fu school, and a regional championship they were never supposed to enter.', 'year' => 1987, 'runtime' => 88, 'rating' => 'PG-13', 'director' => 'Wei Lun Zhao', 'price' => 5.99, 'genre_slug' => 'grindhouse-classics', 'genre' => 'Grindhouse Classics', 'featured' => false],
];

function find_movie(int $id): ?array { return MOVIES[$id] ?? null; }
