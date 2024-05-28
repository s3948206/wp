<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <!-- Contains the navigation bar with the logo integrated in the main menu -->
    <nav>
        <div class="logo">
            <img src="logo.png" alt="Main Logo">
        </div>
        <div class="nav-links">
            <a href="index.php">Home</a>
            <a href="hikes.php">Hikes</a>
            <a href="add.php">Add</a>
            <a href="gallery.php">Gallery</a>
            <a href="login.php">Login</a>
            <a href="register.php">Register</a>
        </div>
        <form id="form"> 
            <input type="search" id="query" name="q" placeholder="Search...">
            <button>Search</button>
        </form> 
    </nav>


</header>

<?php
include './include/db_connect.php';
include './include/header.php';
include './include/nav.php';

// Check if hikeid is set in the query string
if(isset($_GET['id'])) {
    // Sanitize the hikeid to prevent SQL injection
    $hikeid = mysqli_real_escape_string($conn, $_GET['id']);
    
    // Fetch hike details from the database based on hikeid
    $sql = "SELECT * FROM hikes WHERE hikeid = $hikeid";
    $result = mysqli_query($conn, $sql);

    // Check if the query executed successfully
    if($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        // Display hike details
        echo "<div class='hike-details'>";
        echo "<h2>" . $row['hikename'] . "</h2>";
        echo "<img src='images/" . $row['image'] . "' alt='" . $row['hikename'] . "'>";
        echo "<p><strong>Distance:</strong> " . $row['distance'] . " km</p>";
        echo "<p><strong>Level:</strong> " . $row['level'] . "</p>";
        echo "<p><strong>Location:</strong> " . $row['location'] . "</p>";
        echo "</div>";
    } else {
        // Hike not found
        echo "<p>Hike not found.</p>";
    }
} else {
    // Hikeid not provided in the query string
    echo "<p>No hike selected.</p>";
}
?>

</body>
</html>