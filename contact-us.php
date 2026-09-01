<?php

require_once __DIR__ . "/vendor/autoload.php";

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

try {
    $pdo = new PDO(
        "mysql:host={$_ENV['DB_HOST']};dbname={$_ENV['DB_NAME']};charset={$_ENV['DB_CHARSET']}",
        $_ENV['DB_USER'],
        $_ENV['DB_PASS']
    );
} catch (PDOException $e) {
    http_response_code(500);
    exit('Database unavailable.');
}

require __DIR__ . "/views/contact-us.view.php";