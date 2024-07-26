<?php
require '../config/config.php'; // Charger la configuration

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $amount = $_POST['amount'];
    $phone_number = $_POST['phone_number'];

    $api_url = "https://api.wave.example.com/payments"; // URL de l'API Wave
    $data = array(
        'amount' => $amount,
        'phone_number' => $phone_number,
        'currency' => 'XOF'
    );

    $ch = curl_init($api_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Authorization: Bearer ' . WAVE_API_KEY
    ));

    $response = curl_exec($ch);
    curl_close($ch);

    if ($response) {
        echo "Paiement réussi via Wave Mobile Money.";
    } else {
        echo "Erreur lors du paiement via Wave Mobile Money.";
    }
}
