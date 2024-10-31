<?php
session_start(); // Start the session to access session variables
?>
<div class="container">
    <nav>
        <div class="logo">
            <a href="index.php"><img src="images/logo.png" alt="Logo"></a>
        </div>

        <!-- Navigation links -->
        <ul class="nav-links">
            <li><a href="index.php">Home</a></li>
            <li><a href="pets.php">Pets</a></li>
            <li><a href="gallery.php">Gallery</a></li>

            <!-- Conditional display of links based on login status -->
            <?php if (isset($_SESSION['username'])) { ?>
                <li><a href="add.php">Add More</a></li>
                <li><a href="logout.php">Logout</a></li>
            <?php } else { ?>
                <li><a href="register.php">Register</a></li>
                <li><a href="login.php">Login</a></li>
            <?php } ?>
        </ul>

        <!-- Search form -->
        <form method="GET" action="search.php" class="search-form">
            <input type="search" id="query" name="q" placeholder="Search...">
            <button type="submit">
                <span class="material-symbols-outlined">search</span>
            </button>
        </form>

    </nav>
</div>