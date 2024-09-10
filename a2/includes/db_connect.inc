<?php
// Database connection credentials
$servername = "localhost";
$username = "s3948206";
$password = "Impr4za0587";
$dbname = "petsvictoria";

// Create Connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully";
