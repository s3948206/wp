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
    <h3>Victoria has a lot to offer!</h3>
    <p> WHETHER SEEKING SOLACE IN SOLITUDE OR THE COMPANIONSHIP OF FELLOW HIKERS,
        VICTORIA'S TRAILS PROMISE AN UNFORGETTABLE EXPERIENCE WHERE THE SPIRIT OF THE LAND AND THE JOY OF HIKING CONVERGE.
    </p>
    <p>ARE YOU READY TO EXPLORE?</p>

    <div class="gallery">
        <?php
        // Include the database connection file
        include 'db_connect.inc';

        // Query to fetch hike images from the database
        $sql = "SELECT hikeid, hikename, image FROM hikes";
        $result = mysqli_query($conn, $sql);

        // Check if there are rows in the result set
        if ($result && mysqli_num_rows($result) > 0) {
            // Fetch and display each hike image
            while ($row = mysqli_fetch_assoc($result)) {
                $hikeid = $row['hikeid'];
                $hikename = $row['hikename'];
                $image = $row['image'];
                ?>
                <div class="gallery">
                    <a href="details.php?id=<?php echo $hikeid; ?>" target="_blank">
                        <img src="images/<?php echo $image; ?>" alt="<?php echo $hikename; ?>">
                    </a>
                    <div class="description"><?php echo $hikename; ?></div>
                </div>
                <?php
            }
            // Free result set
            mysqli_free_result($result);
        } else {
            echo "No hikes found.";
        }

        // Close database connection
        mysqli_close($conn);
        ?>
    </div>

    <footer>
        <p>&copy; s3948206 Matthew Leviste Raagas</p>
    </footer>
</body>
</html>
