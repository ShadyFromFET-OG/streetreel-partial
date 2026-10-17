<?php
require __DIR__ . '/../includes/bootstrap.php';
json_out(['user' => null, 'cart' => cart_count(), 'csrf' => csrf_token(), 'brand' => BRAND_NAME, 'tagline' => BRAND_TAGLINE, 'currency' => CURRENCY]);
