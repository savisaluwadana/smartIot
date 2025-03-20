<?php
// Database configuration
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'smart_iot');

// Website configuration
define('SITE_NAME', 'SMART-IoT');
define('SITE_URL', 'http://localhost/mr.devon IOT project/');

// Email configuration
define('ADMIN_EMAIL', 'admin@smartiot.com');
define('CONTACT_EMAIL', 'contact@smartiot.com');

// Establish database connection
function getDbConnection() {
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    return $conn;
}

// Helper function to sanitize user input
function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Session handling
session_start();

// Set timezone
date_default_timezone_set('UTC');
?>
