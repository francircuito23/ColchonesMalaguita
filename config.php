<?php

//start session on web page
session_start();

//config.php

//Include Google Client Library for PHP autoload file
require_once 'vendor/autoload.php';

//Make object of Google API Client for call Google API
$google_client = new Google_Client();

//Set the OAuth 2.0 Client ID | Copiar "ID DE CLIENTE"
$google_client->setClientId('1098674476486-m4dl1bes2ivjpmqpjat03oenh3jmit2f.apps.googleusercontent.com');

//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('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');

//Set the OAuth 2.0 Redirect URI | URL AUTORIZADO
$google_client->setRedirectUri('http://localhost/logingoogle/index.php');

// to get the email and profile 
$google_client->addScope('email');

$google_client->addScope('profile');

?>