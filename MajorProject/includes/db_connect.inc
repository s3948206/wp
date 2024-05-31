<?php
//db-connect.inc
//Checks the server you are accessing
if (strstr($_SERVER['SERVER_NAME'], 'localhost')) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "hikesvictoria";
} else {
    $servername = "talsprddb02.int.its.rmit.edu.au";
    $username = "s3948206";
    $password = "M@verick0587";
    $dbname = "s3948206";
}

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
