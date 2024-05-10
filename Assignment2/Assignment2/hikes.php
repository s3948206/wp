<?php
include'./include/header.inc';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hikes</title>
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

<h3>Discover Victoria Your Own Way!</h3>  
<p>NESTLED IN THE VIBRANT LADSCAPE OF VICTORIA, AUSTRALIA, HIKING ENTHUSIASTS CAN DISCOVER
    A REALM OF DIVERSE TERRAINS AND BREATHAKING VISTAS. FROM THE RUGGED COASTLINE
    OF THE GREAT OCEAN WALK TO THE MAJESTIC PEAKS OF TEH GRAMPIANS NATIONAL PARK,<br>
    VICTORIA OFFERS A MOSAIC OF TRAILS THAT CATER TO ADVENTURES OF ALL SKILL LEVELS.
    HIKERS CAN TRAVERSE THROUGH LUSH RAINFOREST IN THE OTWAYS, WHERE THE AIR IS FRESH
    AND THE SOUND OF CASCADING WATERFALLS ACCOMPANIES THE RUSTLE OF FERNS AND TOWERING
    EYCALYPTUS TREES.<br> EACH STEP REVEALS TEH STATE'S NATURAL SPLENDOR, WHETHER IT'S THE
    WILDFLOWERS BLOOMIN IN THE ALPINE NATIONAL PARK OR THE DRAMATIC ROCK FORMATIONS
    DOTTING THE LANDSCAPE OF THE MORNINGTON PENINSULA.
</p>

<img class="falls" src="falls.jpg" alt="falls">

<table>
    <tr> <!-- The top of the table-->
        <th>HIKE</th>
        <th>DISTANCE</th>
        <th>LEVEL</th>
        <th>LOCATION</th>
    </tr>
    <?php
    // Include the database connection file
    include 'db_connect.inc';

    // Query to fetch all hikes from the hikes table
    $sql = "SELECT * FROM hikes";
    $result = mysqli_query($conn, $sql);

    // Check if there are any rows returned
    if (mysqli_num_rows($result) > 0) {
        // Loop through each row of the result set
        while($row = mysqli_fetch_assoc($result)) {
            // Output data from each row as table rows
            echo "<tr>";
            echo "<td>" . $row["hikename"] . "</td>";
            echo "<td>" . $row["distance"] . "KM</td>";
            echo "<td>" . $row["level"] . "</td>";
            echo "<td>" . $row["location"] . "</td>";
            echo "</tr>";
        }
    } else {
        // If no hikes found in the database
        echo "<tr><td colspan='4'>No hikes found</td></tr>";
    }
    ?>
</table>

<footer>
    <p>&copy; s3948206 Matthew Leviste Raagas</p>
</footer>

</body>
</html>
