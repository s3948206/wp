<?php
include'./include/db_connect.inc';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
     <!-- Contains the navigation bar with the logo integrated in the main menu-->
        <nav>
            <div class="logo">
                <img src="logo.png" alt="Main Logo">
            </div>
          
            <div class="dropdown">
                <button class="dropbtn">Menu</button>
                <div class="dropdown-content">
                    <a href="index.php">Home</a>
                    <a href="hikes.php">Hikes</a>
                    <a href="add.php">Add</a>
                    <a href="gallery.php">Gallery</a>
                </div>
            </div> 
            <form id="form"> 
                <input type="search" id="query" name="q" placeholder="Search...">
                <button>Search</button>
              </form> 
        </nav>
            
                    
    </header>

    <h3>Add a hike</h3>
    <p>YOU CAN ADD A NEW HIKE HERE</p>
</body>
</html>
<form class="custom">

<div>
    <label for="hike">Hike Name:</label>
    <br>
    <input type="text" id="hike" name="hike" placeholder="Provide a name for a hike">
</div>
<br>
<div>
    <label for="description">Description:</label>
    <br>
    <input type="text" id="description" name="description" placeholder="Describe the hike briefly">
</div>
<br>
<div>
    <label for="image">Select an Image: <i>MAX Image size 500px</i></label>
    <br>
    <input type="file" id="image" name="image">
</div>
<br>
<div>
    <label for="imageCaption">Image Caption:</label>
    <br>
    <input type="text" id="imageCaption" name="imageCaption" placeholder="Describe the image in one word">
</div>
<br>
<div>
    <label for="distance">Distance:</label>
    <br>
    <input type="text" id="distance" name="distance" placeholder="Distance in Km">
</div>
<br>
<div>
    <label for="location">Location:</label>
    <br>
    <input type="text" id="location" name="location" placeholder="The start of the hike">
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
    <input type="submit" value="submit">
    <!-- adds a clear button-->
    <button type="reset">Clear</button>
</div>
</form>

<?php
// Include the database connection file
include'./include/db_connect.inc';
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $hikename = $_POST['hike'];
    $description = $_POST['description'];
    $imageCaption = $_POST['imageCaption'];
    $distance = $_POST['distance'];
    $location = $_POST['location'];
    $level = $_POST['level'];

    // Check if file is uploaded successfully
    if ($_FILES['image']['error'] == 0) {
        // File upload directory
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
}

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

$hikename = $_POST['hikename'];
$description = $_POST['description'];
$imageCaption = $_POST['caption'];
$distance = $_POST['distance'];
$level = $_POST['level'];
$location = $_POST['location'];
$image = $_POST['image'];

$sql = "INSER INTO hikes (hikename, description, caption, distance, level, location, image) VALUES " ('$hikename', '$description', '$imageCaption', '$distance',
'$level', '$location', '$image');

if ($conn->query($sql)===TRUE) {
    echo 'Form submitted successfully';
}  
else {
    echo "Error: " .$sql."<br>".$conn->error;
}

// Set character set to utf8mb4
mysqli_set_charset($conn, "utf8mb4");

// End of file

// Close database connection
mysqli_close($conn);
?>
