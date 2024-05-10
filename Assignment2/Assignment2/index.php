<?php
include'./include/header.inc';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hikes Vcitoria</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>



<header>
    <!-- Contains the navigation bar with the logo integrated in the main menu-->

  

    <nav>

    <?php
    include'.include/nav.inc';
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

<img src="apostles.jpg" alt="Main Image">
    
        <h1>HIKES VICTORIA</h1>
    <main>
        <h2>WELCOME TO<br> VICTORIA</h2>
    </main>
    
    <div class="f1">
        <footer>
            <p>&copy; s3948206 Matthew Leviste Raagas</p>
        </footer>
    </div>

<?php
include'./include/footer.inc';
?>
</body>
</html>