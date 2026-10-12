<?php
require_once __DIR__ . '/config/constants.php';

$cases = [
    'T1 - Happy path' => [
        'rawDistance' => '8.5', 'weight' => 12.0, 'priority' => 'EXPRESS',
        'customerType' => 'PREMIUM', 'serviceAvailable' => true,
        'expectedTotal' => 97929, 'expectedStatus' => 'ACCEPTED',
    ],
    'T2 - No benefit' => [
        'rawDistance' => '8.5', 'weight' => 5.0, 'priority' => 'NORMAL',
        'customerType' => 'STANDARD', 'serviceAvailable' => true,
        'expectedTotal' => 62100, 'expectedStatus' => 'ACCEPTED',
    ],
    'T3 - Boundary' => [
        'rawDistance' => '7', 'weight' => 5.0, 'priority' => 'NORMAL',
        'customerType' => 'PREMIUM', 'serviceAvailable' => true,
        'expectedTotal' => 48600, 'expectedStatus' => 'ACCEPTED',
    ],
    'T4 - Blocked' => [
        'rawDistance' => '0', 'weight' => 5.0, 'priority' => 'NORMAL',
        'customerType' => 'PREMIUM', 'serviceAvailable' => true,
        'expectedTotal' => 16200, 'expectedStatus' => 'BLOCKED',
    ],
];

foreach ($cases as $name => $case) {
    $rawDistance      = $case['rawDistance'];
    $weight           = $case['weight'];
    $priority         = $case['priority'];
    $customerType     = $case['customerType'];
    $serviceAvailable = $case['serviceAvailable'];

    require __DIR__ . '/src/smartdelivery.php';

    $status      = $isAccepted ? 'ACCEPTED' : 'BLOCKED';
    $totalMatch  = abs($totalDeliveryFee - $case['expectedTotal']) < 0.001; 
    $statusMatch = $status === $case['expectedStatus'];
    $result      = ($totalMatch && $statusMatch) ? 'PASS' : 'FAIL';

    echo $name . PHP_EOL;
    echo '  amountBeforeDiscount = ' . $amountBeforeDiscount . PHP_EOL;
    echo '  discount             = ' . $discount . PHP_EOL;
    echo '  tax                  = ' . $tax . PHP_EOL;
    echo '  total                = ' . $totalDeliveryFee . ' (expected ' . $case['expectedTotal'] . ')' . PHP_EOL;
    echo '  status               = ' . $status . ' (expected ' . $case['expectedStatus'] . ')' . PHP_EOL;
    echo '  => ' . $result . PHP_EOL . PHP_EOL;
}