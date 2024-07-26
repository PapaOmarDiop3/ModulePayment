<?php
require 'vendor/autoload.php'; // Charger les dépendances via Composer

// Charger les variables d'environnement
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Définir les clés API
define('STRIPE_SECRET_KEY', getenv('STRIPE_SECRET_KEY'));
define('ORANGE_API_KEY', getenv('ORANGE_API_KEY'));
define('WAVE_API_KEY', getenv('WAVE_API_KEY'));
