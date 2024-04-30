<?php

require_once __DIR__ . '/../vendor/autoload.php';

$client = new Google\Client();
$client->setApplicationName('Desafio carefy');
$client->setScopes([Google_Service_Sheets::SPREADSHEETS]);
$client->setAccessType('offline');
$client->setAuthConfig(__DIR__ . '/../config/credentials.json');
$service = new Google_Service_Sheets($client);
$spreadsheetId = '1-fWXw-8tuKHiDdaSmNIUnNcRrcah2D8Bw_zaME0HxpM';
$range = 'Página1';