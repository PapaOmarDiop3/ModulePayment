<?php
require '../config/config.php'; // Charger la configuration

$amount = $_GET['amount'] ?? '';
$paymentMethod = $_GET['payment_method'] ?? '';

if (empty($amount) || empty($paymentMethod)) {
    die('Montant et mode de paiement requis.');
}

switch ($paymentMethod) {
    case 'wave':
        header("Location: wave_payment.php?amount=$amount");
        break;
    case 'orange':
        header("Location: orange_money_checkout.php?amount=$amount");
        break;
    case 'stripe':
        header("Location: stripe_checkout.php?amount=$amount");
        break;
    default:
        die('Méthode de paiement non reconnue.');
}
