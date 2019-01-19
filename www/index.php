<?php
header("Content-Type: application/json");
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once '../vendor/autoload.php';

\Dotenv\Dotenv::load(__DIR__ . '/../');

