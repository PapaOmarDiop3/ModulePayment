<?php
require '../config/config.php'; // Charger la configuration

$phoneNumber = 'your_phone_number'; // Remplacez par le numéro de téléphone du client
$amount = $_GET['amount'] ?? '';

if (empty($amount)) {
    die('Montant requis.');
}

// Préparer les données pour le paiement
$data = [
    'amount' => $amount,
    'phoneNumber' => $phoneNumber,
    'currency' => 'XOF',
];

// Configuration de l'URL et des en-têtes pour la requête
$url = 'https://api.orange.com/orange-money-webpay/sandbox/v1/transfer';
$headers = [
    'Authorization: Bearer ' . ORANGE_API_KEY,
    'Content-Type: application/json',
];

// Effectuer la requête HTTP POST
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

$response = curl_exec($ch);
curl_close($ch);

if ($response === false) {
    die('Erreur de connexion à l\'API Orange Money.');
}

// Décoder la réponse JSON de l'API
$responseData = json_decode($response, true);

if (isset($responseData['status']) && $responseData['status'] === 'SUCCESS') {
    echo '<h1>Orange Money Checkout</h1>';
    echo '<p>Montant: ' . htmlspecialchars($amount) . ' XOF</p>';
    echo '<p>Votre paiement est en cours de traitement. Vous serez redirigé vers la page de confirmation.</p>';
} else {
    echo '<h1>Erreur de paiement</h1>';
    echo '<p>Le paiement n\'a pas pu être effectué. Veuillez réessayer plus tard.</p>';
}
