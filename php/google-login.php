<?php
session_start();
$_SESSION['remember_google'] = isset($_GET['remember']) && $_GET['remember'] == 1;

require_once __DIR__ . '/vendor/autoload.php';

$client = new Google_Client();
$client->setClientId('1097292719652-plk0lmgoscknjhd63ae79dv2r94c5d07.apps.googleusercontent.com');
$client->setClientSecret('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');
$client->setRedirectUri('https://web-work.gamer.gd/php/google-callback.php');
$client->addScope("email");
$client->addScope("profile");



header('Location: ' . $client->createAuthUrl());
exit;
?>