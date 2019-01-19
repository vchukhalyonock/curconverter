<?php
//header("Content-Type: application/json");
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::create(__DIR__ . '/../');
$dotenv->load();

$result = \App\CurrencyConverter::convert(
    getenv('CURRENCY1'),
    getenv('CURRENCY2'),
    100
);
