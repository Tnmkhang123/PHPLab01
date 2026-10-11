<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SmartDelivery Fare</title>
</head>
<body>
    <h1>SmartDelivery Receipt</h1>
    <p>Distance: <?= $distanceKm ?> km</p>
    <p>Weight: <?= $weight ?> kg</p>
    <p>Priority: <?= $priority ?></p>
    <p>Base Fee: <?= $baseFee ?> <?= CURRENCY ?></p>
    <p>Distance Fee: <?= $distanceFee ?> <?= CURRENCY ?></p>
    <p>Surcharge: <?= $surcharge ?> <?= CURRENCY ?></p>
    <p>Discount: <?= $discount ?> <?= CURRENCY ?></p>
    <p>Tax: <?= $tax ?> <?= CURRENCY ?></p>
    <p><strong>Total Delivery Fee: <?= $totalDeliveryFee ?> <?= CURRENCY ?></strong></p>
    <p>Status: <?= $isAccepted ? "ACCEPTED" : "BLOCKED" ?></p>
</body>
</html>