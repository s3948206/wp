<?php
include './include/header.inc';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hikes Victoria</title>
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

<img src="apostles.jpg" alt="Main Image">

<h1>HIKES VICTORIA</h1>
<main>
    <h2>WELCOME TO<br>VICTORIA</h2>
</main>

<div class="f1">
    <footer>
        <p>&copy; s3948206 Matthew Leviste Raagas</p>
    </footer>
</div>

<?php
include './include/footer.inc';
?>
</body>
</html>
