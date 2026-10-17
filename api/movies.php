<?php
// GET api/movies.php?q=&genre=&sort=new|year|old|price|title&featured=1&limit=60
require __DIR__ . '/../includes/bootstrap.php';

$q = trim((string)($_GET['q'] ?? ''));
$genre = trim((string)($_GET['genre'] ?? ''));
$sort = (string)($_GET['sort'] ?? 'new');
$featured = !empty($_GET['featured']);
$limit = max(1, min(60, (int)($_GET['limit'] ?? 60)));

$list = array_values(array_filter(MOVIES, function ($m) use ($q, $genre, $featured) {
    if ($genre !== '' && $m['genre_slug'] !== $genre) return false;
    if ($featured && !$m['featured']) return false;
    if ($q !== '') {
        foreach ([$m['title'], $m['director'], $m['tagline']] as $field) if (stripos($field, $q) !== false) return true;
        return false;
    }
    return true;
}));

usort($list, match ($sort) {
    'year'  => fn($a, $b) => $b['year'] <=> $a['year'],
    'old'   => fn($a, $b) => $a['year'] <=> $b['year'],
    'price' => fn($a, $b) => $a['price'] <=> $b['price'],
    'title' => fn($a, $b) => strcasecmp($a['title'], $b['title']),
    default => fn($a, $b) => $b['id'] <=> $a['id'],
});

$movies = array_map(fn($m) => [
    'id' => $m['id'], 'title' => $m['title'], 'tagline' => $m['tagline'], 'year' => $m['year'], 'runtime' => $m['runtime'],
    'rating' => $m['rating'], 'director' => $m['director'], 'price' => $m['price'], 'genre' => $m['genre'],
    'genreSlug' => $m['genre_slug'], 'featured' => $m['featured'], 'poster' => poster_src($m),
], array_slice($list, 0, $limit));

$genres = [];
foreach (GENRES as $slug => $name) {
    $genres[] = ['name' => $name, 'slug' => $slug, 'total' => count(array_filter(MOVIES, fn($m) => $m['genre_slug'] === $slug))];
}
usort($genres, fn($a, $b) => strcasecmp($a['name'], $b['name']));
json_out(['movies' => $movies, 'genres' => $genres]);
