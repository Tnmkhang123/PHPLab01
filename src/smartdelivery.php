<?php
$distanceKm = (float) $rawDistance;

$baseFee = BASE_FEE;
$distanceFee = $distanceKm * RATE_PER_KM;

$isHeavy = $weight > HEAVY_WEIGHT_MIN;
$heavySurcharge = $isHeavy ? HEAVY_SURCHARGE : 0;

$subtotal = $baseFee + $distanceFee + $heavySurcharge;
$isExpress = $priority === "EXPRESS";
$expressSurcharge = $isExpress ? $subtotal * EXPRESS_RATE : 0;

$surcharge = $heavySurcharge + $expressSurcharge;

$amountBeforeDiscount = $baseFee + $distanceFee + $surcharge;
$isPremiumMember = $customerType === "PREMIUM";
$isDiscountEligible = $isPremiumMember && $amountBeforeDiscount >= PREMIUM_MIN;
$discount = $isDiscountEligible ? $amountBeforeDiscount * PREMIUM_DISCOUNT_RATE : 0;

$amountAfterDiscount = $amountBeforeDiscount - $discount;
$tax = $amountAfterDiscount * TAX_RATE;
$totalDeliveryFee = $baseFee + $distanceFee + $surcharge - $discount + $tax;

$hasValidDistance = $distanceKm > 0;
$hasValidWeight = $weight > 0;
$hasValidPriority = $priority === "NORMAL" || $priority === "EXPRESS";

$isAccepted = $hasValidDistance && $hasValidWeight && $hasValidPriority && $serviceAvailable;