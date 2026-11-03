<?php

/**
 * =========================================================
 * Webby - Database Configuration
 * =========================================================
 */

require_once __DIR__ . '/app.php';


// =========================================================
// Database Credentials
// =========================================================
//
// DEVELOPMENT
//

$db_host = getenv('DB_HOST') ?: 'db';
$db_name = getenv('DB_NAME') ?: 'webby';
$db_user = getenv('DB_USER') ?: 'root';
$db_pass = getenv('DB_PASSWORD') ?: 'root';

if (is_production()) {
    $missingSettings = [];
    foreach (['DB_HOST', 'DB_NAME', 'DB_USER', 'DB_PASSWORD'] as $setting) {
        if (getenv($setting) === false || getenv($setting) === '') {
            $missingSettings[] = $setting;
        }
    }

    if ($missingSettings !== []) {
        error_log('Missing production database settings: ' . implode(', ', $missingSettings));
        http_response_code(500);
        exit('Database configuration is incomplete.');
    }
}


// =========================================================
// PDO Connection
// =========================================================

try {

    $pdo = new PDO(
        "mysql:host={$db_host};dbname={$db_name};charset=utf8mb4",
        $db_user,
        $db_pass,
        [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ]
    );

} catch (PDOException $e) {

    error_log(
        'Webby Database Connection Error: ' .
        $e->getMessage()
    );

    if (is_development()) {

        die(
            'Database connection failed: ' .
            e($e->getMessage())
        );

    }

    http_response_code(500);

    die(
        'Unable to connect to the database.'
    );

}