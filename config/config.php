<?php
/**
 * Configuration File
 * Smart School Management System
 * Database and application settings
 */

// Application Settings
define('APP_NAME', 'Smart School Management System');
define('APP_VERSION', '1.0.0');
define('APP_ENV', 'production'); // development, testing, production

// Database Configuration
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'ssms_db');
define('DB_PORT', 3306);

// Site URL Configuration
define('SITE_URL', 'http://localhost/ssms/');
define('SITE_ROOT', $_SERVER['DOCUMENT_ROOT'] . '/ssms/');

// Email Configuration
define('MAIL_HOST', 'smtp.mailtrap.io');
define('MAIL_PORT', 2525);
define('MAIL_USER', 'your_mailtrap_user');
define('MAIL_PASS', 'your_mailtrap_password');
define('MAIL_FROM', 'noreply@schoolsms.com');
define('MAIL_FROM_NAME', 'School SMS');

// JWT Settings
define('JWT_SECRET', 'your-secret-key-change-in-production');
define('JWT_ALGORITHM', 'HS256');
define('JWT_EXPIRATION', 86400); // 24 hours in seconds

// Session Configuration
ini_set('session.name', 'SSMS_SESSION');
ini_set('session.cookie_lifetime', 86400); // 24 hours
ini_set('session.cookie_secure', false); // Set to true in production with HTTPS
ini_set('session.cookie_httponly', true);
ini_set('session.cookie_samesite', 'Strict');

// File Upload Settings
define('MAX_UPLOAD_SIZE', 5242880); // 5MB in bytes
define('ALLOWED_EXTENSIONS', ['jpg', 'jpeg', 'png', 'pdf', 'doc', 'docx', 'xls', 'xlsx']);
define('UPLOAD_DIR', SITE_ROOT . 'uploads/');

// Pagination Settings
define('ITEMS_PER_PAGE', 15);

// Date Format
define('DATE_FORMAT', 'Y-m-d');
define('DATETIME_FORMAT', 'Y-m-d H:i:s');
define('DISPLAY_DATE_FORMAT', 'd M Y');
define('DISPLAY_TIME_FORMAT', 'h:i A');

// Timezone
date_default_timezone_set('UTC');

// Error Reporting
if (APP_ENV === 'development') {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
} else {
    error_reporting(E_ALL);
    ini_set('display_errors', 0);
    ini_set('log_errors', 1);
    ini_set('error_log', SITE_ROOT . 'logs/error.log');
}

// User Roles
define('ROLES', [
    'super_admin' => 'Super Administrator',
    'admin' => 'Administrator',
    'teacher' => 'Teacher',
    'staff' => 'Staff',
    'student' => 'Student',
    'parent' => 'Parent'
]);

// Permissions
define('PERMISSIONS', [
    'super_admin' => ['*'], // All permissions
    'admin' => [
        'view_dashboard',
        'manage_users',
        'manage_students',
        'manage_teachers',
        'manage_staff',
        'manage_classes',
        'manage_subjects',
        'manage_results',
        'manage_fees',
        'manage_payments',
        'view_reports',
        'manage_settings'
    ],
    'teacher' => [
        'view_dashboard',
        'view_students',
        'manage_attendance',
        'manage_results',
        'view_notifications'
    ],
    'staff' => [
        'view_dashboard',
        'manage_attendance',
        'view_notifications'
    ],
    'student' => [
        'view_dashboard',
        'view_results',
        'view_attendance',
        'view_fees',
        'view_notifications'
    ],
    'parent' => [
        'view_dashboard',
        'view_results',
        'view_attendance',
        'view_fees',
        'view_notifications'
    ]
]);

// System Settings
define('SCHOOL_NAME', 'Your School Name');
define('SCHOOL_ADDRESS', '123 School Street, City, State 12345');
define('SCHOOL_PHONE', '+1 (234) 567-890');
define('SCHOOL_EMAIL', 'info@school.com');
define('SCHOOL_LOGO', SITE_URL . 'assets/images/logo.png');
define('SCHOOL_FAVICON', SITE_URL . 'assets/images/favicon.ico');

// Academic Settings
define('CURRENT_SESSION', '2024/2025');
define('CURRENT_TERM', 'First Term');
define('ACADEMIC_YEAR_START', '2024-01-01');
define('ACADEMIC_YEAR_END', '2024-12-31');

// Notification Settings
define('ENABLE_EMAIL_NOTIFICATIONS', true);
define('ENABLE_SMS_NOTIFICATIONS', false);
define('ENABLE_PUSH_NOTIFICATIONS', false);

// SMS Gateway (for SMS notifications)
define('SMS_PROVIDER', 'twilio'); // twilio, nexmo, africastalking
define('SMS_API_KEY', 'your-api-key');
define('SMS_API_SECRET', 'your-api-secret');

// Helper function to get database connection
function getDBConnection() {
    try {
        $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT);
        
        if ($conn->connect_error) {
            throw new Exception("Connection failed: " . $conn->connect_error);
        }
        
        $conn->set_charset("utf8mb4");
        return $conn;
    } catch (Exception $e) {
        if (APP_ENV === 'development') {
            die("Database Error: " . $e->getMessage());
        } else {
            error_log($e->getMessage());
            die("A database error occurred. Please try again later.");
        }
    }
}

// Helper function to check if user has permission
function hasPermission($permission) {
    if (!isset($_SESSION['role'])) {
        return false;
    }
    
    $userRole = $_SESSION['role'];
    $userPermissions = PERMISSIONS[$userRole] ?? [];
    
    if (in_array('*', $userPermissions)) {
        return true; // Super admin has all permissions
    }
    
    return in_array($permission, $userPermissions);
}

// Helper function to require permission
function requirePermission($permission) {
    if (!hasPermission($permission)) {
        header('HTTP/1.0 403 Forbidden');
        die('Access Denied: You do not have permission to access this resource.');
    }
}

// Helper function to sanitize input
function sanitize($input) {
    return htmlspecialchars(trim($input), ENT_QUOTES, 'UTF-8');
}

// Helper function to validate email
function isValidEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

// Helper function to validate phone
function isValidPhone($phone) {
    return preg_match('/^[\d\s\-\+\(\)]{10,}$/', $phone);
}

// Helper function to format currency
function formatCurrency($amount) {
    return '$' . number_format($amount, 2);
}

// Helper function to format date
function formatDate($date) {
    return date(DISPLAY_DATE_FORMAT, strtotime($date));
}

// Helper function to format datetime
function formatDateTime($datetime) {
    return date(DISPLAY_DATE_FORMAT . ' ' . DISPLAY_TIME_FORMAT, strtotime($datetime));
}

// CORS Headers (if API is accessed from frontend)
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
    header('Access-Control-Allow-Headers: Content-Type, Authorization');
    header('HTTP/1.1 200 OK');
    exit();
}
?>
