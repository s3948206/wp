<?php
include('./includes/header.inc');
include('./includes/db_connect.inc');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hikes Victoria</title>
    <link rel="stylesheet" href="style.css">
    <!-- Add Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<header>
    <nav class="navbar">
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
        <form id="form" action="search.php" method="GET" class="form-inline">
            <input type="search" id="query" name="q" placeholder="Search..." class="form-control mr-sm-2">
            <select id="level" name="level" class="form-control mr-sm-2">
                <option value="">All Levels</option>
                <option value="Easy">Easy</option>
                <option value="Moderate">Moderate</option>
                <option value="Difficult">Difficult</option>
                <!-- Add more options if needed -->
            </select>
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
    </nav>
</header>

<?php


// Initialize variables to store search parameters
$keyword = isset($_GET['q']) ? '%' . $_GET['q'] . '%' : '';
$level = isset($_GET['level']) ? $_GET['level'] : '';

// Prepare the SQL statement with placeholders for security
$sql = "SELECT * FROM hikes WHERE (hikename LIKE ? OR description LIKE ?)";

// Add condition for level if specified
if (!empty($level)) {
    $sql .= " AND level = ?";
}

// Prepare the statement
$stmt = mysqli_prepare($conn, $sql);

// Bind parameters
mysqli_stmt_bind_param($stmt, "sss", $keyword, $keyword, $level);

// Execute the query
mysqli_stmt_execute($stmt);

// Get the result set
$result = mysqli_stmt_get_result($stmt);

// Check if there are rows in the result set
if ($result && mysqli_num_rows($result) > 0) {
    // Output the search results
    while ($row = mysqli_fetch_assoc($result)) {
        // Display hike details
        echo "<div class='hike-details'>";
        echo "<h2>" . htmlspecialchars($row['hikename']) . "</h2>";
        echo "<img src='images/" . htmlspecialchars($row['image']) . "' alt='" . htmlspecialchars($row['hikename']) . "'>";
        echo "<p><strong>Description:</strong> " . nl2br(htmlspecialchars($row['description'])) . "</p>";
        echo "<p><strong>Distance:</strong> " . htmlspecialchars($row['distance']) . " km</p>";
        echo "<p><strong>Level:</strong> " . htmlspecialchars($row['level']) . "</p>";
        echo "<p><strong>Location:</strong> " . htmlspecialchars($row['location']) . "</p>";
        echo "</div>";
    }
} else {
    echo "No hikes found.";
}

// Close the statement and database connection
mysqli_stmt_close($stmt);
mysqli_close($conn);
?>

<?php
include('./includes/footer.inc');
?>