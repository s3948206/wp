<?php
// Check if the user is logged in. If not, redirect to the login page.
// Implement your own logic to check if the user is logged in.
$loggedIn = true; // Placeholder for the logged-in status

if(!$loggedIn) {
    header("Location: login.php");
    exit(); // Stop further execution
}

include './include/db_connect.php';
include './include/header.php';
include './include/nav.php';

if(isset($_GET['id'])) {
    // Sanitize the hikeid to prevent SQL injection
    $hikeid = mysqli_real_escape_string($conn, $_GET['id']);
    
    // Fetch hike details from the database based on hikeid
    $sql = "SELECT * FROM hikes WHERE hikeid = $hikeid";
    $result = mysqli_query($conn, $sql);

    // Check if the query executed successfully
    if($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Hike</title>
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

<h2>Edit Hike</h2>

<form action="edit_process.php" method="post" enctype="multipart/form-data" class="custom">
    <input type="hidden" name="hikeid" value="<?php echo $row['hikeid']; ?>">
    <div>
        <label for="hike">Hike Name:</label>
        <br>
        <input type="text" id="hike" name="hike" value="<?php echo $row['hikename']; ?>" required>
    </div>
    <br>
    <div>
        <label for="description">Description:</label>
        <br>
        <input type="text" id="description" name="description" value="<?php echo $row['description']; ?>" required>
    </div>
    <br>
    <!-- Add other input fields for editing hike details -->
    <input type="submit" value="Submit">
    <button type="reset">Clear</button>
</form>

</body>
</html>

<?php
    } else {
        // Hike not found
        echo "<p>Hike not found.</p>";
    }
} else {
    // Hikeid not provided in the query string
    echo "<p>No hike selected.</p>";
}
?>
