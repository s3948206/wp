<?php
include './includes/db_connect.inc';
include './includes/header.inc';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <!-- Contains the navigation bar with the logo integrated in the main menu -->
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

<h3>Add a hike</h3>
<p>YOU CAN ADD A NEW HIKE HERE</p>

<form action="add.php" method="post" enctype="multipart/form-data" class="custom">
    <div>
        <label for="hike">Hike Name:</label>
        <br>
        <input type="text" id="hike" name="hike" placeholder="Provide a name for a hike" required>
    </div>
    <br>
    <div>
        <label for="description">Description:</label>
        <br>
        <input type="text" id="description" name="description" placeholder="Describe the hike briefly" required>
    </div>
    <br>
    <div>
        <label for="image">Select an Image: <i>MAX Image size 500px</i></label>
        <br>
        <input type="file" id="image" name="image" required>
    </div>
    <br>
    <div>
        <label for="imageCaption">Image Caption:</label>
        <br>
        <input type="text" id="imageCaption" name="imageCaption" placeholder="Describe the image in one word" required>
    </div>
    <br>
    <div>
        <label for="distance">Distance:</label>
        <br>
        <input type="text" id="distance" name="distance" placeholder="Distance in Km" required>
    </div>
    <br>
    <div>
        <label for="location">Location:</label>
        <br>
        <input type="text" id="location" name="location" placeholder="The start of the hike" required>
    </div>
    <br>
    <div>
        <label for="level">Level:</label>
        <br>
        <select id="level" name="level" required>
            <option value="">--Choose an option--</option>
            <option value="easy">Easy</option>
            <option value="moderate">Moderate</option>
            <option value="hard">Hard</option>
        </select>
    </div>
    <br>
    <input type="submit" value="Submit">
    <button type="reset">Clear</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection
    $conn = mysqli_connect("localhost", "root", "", "hikesvictoria");

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $targetDir = "images/";

    $hikename = mysqli_real_escape_string($conn, $_POST['hike']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $imageCaption = mysqli_real_escape_string($conn, $_POST['imageCaption']);
    $distance = mysqli_real_escape_string($conn, $_POST['distance']);
    $location = mysqli_real_escape_string($conn, $_POST['location']);
    $level = mysqli_real_escape_string($conn, $_POST['level']);

    // Check if file is uploaded successfully
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {    
        $targetDir = "images/";
        $fileName = basename($_FILES["image"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        // Allow certain file formats
        $allowedTypes = array('jpg', 'jpeg', 'png');
        if (in_array($fileType, $allowedTypes)) {
            // Upload file to the server
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
                // Insert data into the database
                $sql = "INSERT INTO hikes (hikename, description, caption, distance, level, location, image) 
                        VALUES ('$hikename', '$description', '$imageCaption', $distance, '$level', '$location', '$fileName')";
                if (mysqli_query($conn, $sql)) {
                    echo "Hike added successfully.";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
            } else {
                echo "Error uploading file.";
            }
        } else {
            echo "Invalid file type.";
        }
    } else {
        echo "Error uploading file.";
    }

    // Close database connection
    mysqli_close($conn);
}
?>

<br><br><br><br><br><br>

<?php
include ('./includes/footer.inc');
?>

</body>
</html>
