<?php
include('./includes/header.inc');
include('./includes/db_connect.inc');
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
    <h3>Victoria has a lot to offer!</h3>
    <p> WHETHER SEEKING SOLACE IN SOLITUDE OR THE COMPANIONSHIP OF FELLOW HIKERS,
        VICTORIA'S TRAILS PROMISE AN UNFORGETTABLE EXPERIENCE WHERE THE SPIRIT OF THE LAND AND THE JOY OF HIKING CONVERGE.
    </p>
    <p>ARE YOU READY TO EXPLORE?</p>

    <div class="filter">
        <form method="GET" action="gallery.php">
            <label for="level">Select Hike Level:</label>
            <select name="level" id="level">
                <option value="">All Levels</option>
                <?php
                // Query to fetch all unique levels from the hikes table
                $levelSql = "SELECT DISTINCT level FROM hikes";
                $levelResult = mysqli_query($conn, $levelSql);
                if ($levelResult && mysqli_num_rows($levelResult) > 0) {
                    while ($levelRow = mysqli_fetch_assoc($levelResult)) {
                        $level = htmlspecialchars($levelRow['level']);
                        echo "<option value='$level'>$level</option>";
                    }
                    mysqli_free_result($levelResult);
                }
                ?>
            </select>
            <button type="submit">Filter</button>
        </form>
    </div>

    <div class="gallery">
        <?php
        // Check if level is set in the query string and sanitize it
        $selectedLevel = isset($_GET['level']) ? mysqli_real_escape_string($conn, $_GET['level']) : '';

        // Modify the query to filter hikes by the selected level if provided
        $sql = "SELECT hikeid, hikename, image FROM hikes";
        if ($selectedLevel) {
            $sql .= " WHERE level = '$selectedLevel'";
        }

        $result = mysqli_query($conn, $sql);

        // Check if there are rows in the result set
        if ($result && mysqli_num_rows($result) > 0) {
            // Fetch and display each hike image
            while ($row = mysqli_fetch_assoc($result)) {
                $hikeid = htmlspecialchars($row['hikeid']);
                $hikename = htmlspecialchars($row['hikename']);
                $image = htmlspecialchars($row['image']);
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

    <?php
    include('./includes/footer.inc');
    ?>
</body>
</html>
