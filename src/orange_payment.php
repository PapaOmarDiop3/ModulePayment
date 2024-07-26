<?php
// orange_payment.php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $amount = $_POST['amount'];
    $phone_number = $_POST['phone_number'];

    // URL de l'API Orange Money (exemple, à remplacer par l'URL réelle)
    $api_url = "https://api.orange.example.com/payments";

    // Données pour l'API
    $data = array(
        'amount' => $amount,
        'phone_number' => $phone_number,
        'currency' => 'XOF' // Exemple de devise, à ajuster
    );

    // Initialiser cURL
    $ch = curl_init($api_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Authorization: Bearer your_orange_api_key'
    ));

    // Exécuter la requête
    $response = curl_exec($ch);
    curl_close($ch);

    // Vérifier la réponse
    if ($response) {
        echo "Paiement réussi via Orange Money.";
    } else {
        echo "Erreur lors du paiement via Orange Money.";
    }
}
?>
