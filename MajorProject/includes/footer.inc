<?php
include('./includes/db_connect.inc');
?>

<footer>

    <p> &copy; s3948206 Matthew Leviste Raagas | All rights reserved | Designed for Hikes Victoria</p>
<nav class="user-nav">
        <nav class="user-nav">
        <ul>
            <?php
            // Query to fetch distinct usernames of users who have uploaded hikes
            $sql = "SELECT DISTINCT username FROM hikes";
            $result = mysqli_query($conn, $sql);

            // Check if there are rows in the result set
            if ($result && mysqli_num_rows($result) > 0) {
                // Fetch and display each username as a hyperlink
                while ($row = mysqli_fetch_assoc($result)) {
                    $username = $row['username'];
                    echo "<li><a href='user.php?username=$username'>$username</a></li>";
                }
                // Free result set
                mysqli_free_result($result);
            } else {
                echo "No users found.";
            }

            // Close database connection
            mysqli_close($conn);
            ?>
        </ul>
    </nav>

</footer>
