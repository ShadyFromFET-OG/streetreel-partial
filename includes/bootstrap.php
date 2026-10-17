<?php
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/data.php';

session_set_cookie_params(['httponly' => true, 'samesite' => 'Lax']);
if (session_status() === PHP_SESSION_NONE) session_start();

function e($v): string { return htmlspecialchars((string)$v, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); }
function money($n): string { return CURRENCY . number_format((float)$n, 2); }
function redirect(string $url): never { header('Location: ' . $url); exit; }
function json_out($data, int $code = 200): never {
    http_response_code($code);
    header('Content-Type: application/json; charset=utf-8');
    header('Cache-Control: no-store');
    echo json_encode($data, JSON_UNESCAPED_UNICODE);
    exit;
}
function poster_src(array $m): string { return 'api/poster.php?id=' . (int)$m['id']; }

function csrf_token(): string {
    if (empty($_SESSION['csrf'])) $_SESSION['csrf'] = bin2hex(random_bytes(32));
    return $_SESSION['csrf'];
}
function csrf_field(): string { return '<input type="hidden" name="csrf" value="' . e(csrf_token()) . '">'; }
function csrf_ok(): bool {
    $sent = $_POST['csrf'] ?? ($_SERVER['HTTP_X_CSRF_TOKEN'] ?? '');
    return is_string($sent) && hash_equals(csrf_token(), $sent);
}
function csrf_require(): void {
    if (!csrf_ok()) { http_response_code(419); exit('Session expired. Go back, reload the page and try again.'); }
}

/* Cart lives in the PHP session (no database in this build) */
function cart_ids(): array { return array_values(array_unique(array_map('intval', $_SESSION['cart'] ?? []))); }
function cart_count(): int { return count(cart_ids()); }
function cart_add(int $id): void { $c = cart_ids(); if (!in_array($id, $c, true)) $c[] = $id; $_SESSION['cart'] = $c; }
function cart_remove(int $id): void { $_SESSION['cart'] = array_values(array_diff(cart_ids(), [$id])); }
