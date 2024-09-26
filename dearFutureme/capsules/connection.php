<?php
$host = 'localhost';
$dbname = 'dearfuture_db'; // Replace with your database name
$username = 'root'; // Default username for XAMPP
$password = ''; // Default password for 'root' user is usually empty

// Create a new database connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
