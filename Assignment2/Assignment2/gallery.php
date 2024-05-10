<?php
include'./include/header.inc/';
?>

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
     <!-- Contains the navigation bar with the logo integrated in the main menu-->
        <nav>

        <?php
        include'./include/nav.inc';
        ?>

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
<h3>Victoria has a lot to offer!</h3>
    <p> WHETHER SEEKING SOLACE IN SOLITURE OR THE COMPANIONSHOP OF FELLOW HIKERS,
        VICTORIA'S TRAILS PROMISE AN UNFORGETTABLE EXPERIENCE WHERE THE SPRIT OFTHE LAND AND THE JOY OF HIKING CONVERGE. <br> 
    </p>
    <p>ARE YOU READY TO EXPLORE?</p>

<?php
// Include the file containing database connection
include'./include/db_connect.inc';

// Query to fetch hike data from the database
$sql = "SELECT hikeid, hikename, image FROM hikes";
$result = mysqli_query($conn, $sql);

// Check if there are any results
if (mysqli_num_rows($result) > 0) {
    // Output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<div class="gallery">';
        echo '<a target="_blank" href="details.php?hikeid=' . $row['hikeid'] . '">';
        echo '<img class="werribee" src="images/' . $row['image'] . '" alt="' . $row['hikename'] . '">';
        echo '</a>';
        echo '<div class="description">' . $row['hikename'] . '</div>';
        echo '</div>';
    }
} else {
    echo "No hikes found";
}

// Close the database connection
mysqli_close($conn);
?>

<footer>
    <p>&copy; s3948206 Matthew Leviste Raagas</p>
</footer>

<?php
include'./include/footer.inc';
?>

</body>
</html>
