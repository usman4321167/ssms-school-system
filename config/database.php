<?php
/**
 * Database Configuration
 * Smart School Management System
 */

// Database credentials
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'school_management');

// Establish PDO connection
try {
    $pdo = new PDO(
        'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4',
        DB_USER,
        DB_PASS,
        array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false
        )
    );
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Session configuration
if (session_status() === PHP_SESSION_NONE) {
    session_start();
    session_set_cookie_params([
        'lifetime' => 3600,
        'path' => '/',
        'httponly' => true,
        'secure' => false,
        'samesite' => 'Lax'
    ]);
}

// System configuration
define('SITE_URL', 'http://localhost/ssms/');
define('UPLOAD_DIR', __DIR__ . '/../uploads/');
define('ALLOWED_EXTENSIONS', array('jpg', 'jpeg', 'png', 'gif', 'webp'));
define('MAX_FILE_SIZE', 5242880); // 5MB

// Timezone
date_default_timezone_set('UTC');
?>
