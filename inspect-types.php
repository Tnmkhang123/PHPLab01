<?php
// inspect-types.php - CLI evidence: type cua gia tri TRUOC va SAU explicit casting
// Chay: php inspect-types.php
require_once __DIR__ . '/config/constants.php';
require_once __DIR__ . '/data/smartdelivery-data.php';
require_once __DIR__ . '/src/smartdelivery.php';

echo "=== TRUOC khi cast (raw tu data/) ===" . PHP_EOL;
echo 'gettype($rawDistance) = ' . gettype($rawDistance) . PHP_EOL;
var_dump($rawDistance);

echo PHP_EOL . "=== SAU khi cast (clean trong src/) ===" . PHP_EOL;
echo 'gettype($distanceKm)  = ' . gettype($distanceKm) . PHP_EOL;
var_dump($distanceKm);
// Pure PHP file: intentionally no closing tag
