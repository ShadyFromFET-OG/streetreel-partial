<?php
// POST JSON {action:"add"|"remove", movie_id:int} + header X-CSRF-Token. Cart is stored in the session.
require __DIR__ . '/../includes/bootstrap.php';
if ($_SERVER['REQUEST_METHOD'] === 'GET') json_out(['count' => cart_count()]);
if ($_SERVER['REQUEST_METHOD'] !== 'POST') json_out(['error' => 'Method not allowed.'], 405);
if (!csrf_ok()) json_out(['error' => 'Session expired. Reload the page.'], 419);

$body = json_decode(file_get_contents('php://input'), true) ?: [];
$movie = find_movie((int)($body['movie_id'] ?? 0));
if (!$movie) json_out(['error' => 'That movie does not exist.'], 404);

switch ($body['action'] ?? '') {
    case 'add':    cart_add($movie['id']);    json_out(['count' => cart_count(), 'message' => $movie['title'] . ' is in your cart.']);
    case 'remove': cart_remove($movie['id']); json_out(['count' => cart_count(), 'message' => 'Removed from cart.']);
}
json_out(['error' => 'Unknown action.'], 400);
