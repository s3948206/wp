<?php
// Check if the script is running on the local machine or on the production server
if ($_SERVER['SERVER_NAME'] == 'localhost') {

    $servername = "localhost";
    $username = "s3948206";
    $password = "Impr4za0587";
    $dbname = "petsvictoria";
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
