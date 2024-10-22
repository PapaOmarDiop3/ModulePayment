<?php
require '../config/config.php'; // Charger la configuration

\Stripe\Stripe::setApiKey(STRIPE_SECRET_KEY);

$amount = $_GET['amount'] ?? '';

if (empty($amount)) {
    die('Montant requis.');
}

$session = \Stripe\Checkout\Session::create([
    'payment_method_types' => ['card'],
    'line_items' => [[
        'price_data' => [
            'currency' => 'eur',
            'product_data' => [
                'name' => 'Paiement en ligne',
            ],
            'unit_amount' => $amount * 100,
        ],
        'quantity' => 1,
    ]],
    'mode' => 'payment',
    'success_url' => 'http://localhost/ModuleProjet/payment_module/public/success.html',
    'cancel_url' => 'http://localhost/ModuleProjet/payment_module/public/cancel.html',
]);

header("Location: " . $session->url);
