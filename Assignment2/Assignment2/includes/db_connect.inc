<?php
// Database credentials
$servername = "localhost"; 
$username = "your_username"; 
$password = " "; 
$database = "hikesvictoria"; 

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Set character set to utf8mb4
mysqli_set_charset($conn, "utf8mb4");

// End of file
?>
