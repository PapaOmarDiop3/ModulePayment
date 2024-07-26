<?php
require 'vendor/autoload.php'; 

\Stripe\Stripe::setApiKey(getenv('STRIPE_SECRET_KEY')); 

$token = $_POST['stripeToken'];
$amount = $_POST['amount'] * 100; 

try {
    $charge = \Stripe\Charge::create([
        'amount' => $amount,
        'currency' => 'eur',
        'description' => 'Paiement pour le module de paiement électronique',
        'source' => $token,
    ]);
    header('Location: /public/payment_success.html');
} catch (\Stripe\Exception\CardException $e) {
    // Enregistrer l'erreur
    error_log($e->getMessage());
    header('Location: /public/payment_failed.html');
} catch (Exception $e) {
    // Enregistrer l'erreur
    error_log($e->getMessage());
    header('Location: /public/payment_failed.html');
}
?>
