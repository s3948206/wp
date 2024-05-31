<?php
include ('./includes/header.inc');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hikes Victoria</title>
    <link rel="stylesheet" href="style.css">
    <!-- Add Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<header>
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

<div class="header-container">
    <div>
        <h1>HIKES VICTORIA</h1>
        <br><br>
        <h2>WELCOME TO<br>VICTORIA</h2>
    </div>
    <div class="carousel-container">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="apostles.jpg" class="d-block w-100" alt="12 Apostles">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>12 Apostles</h5>
                        <p>View of the 12 Apostles</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="capewoolamai.jpg" class="d-block w-100" alt="Cape Woolamai">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Cape Woolamai</h5>
                        <p>Cape Woolamai views</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="grampians.jpg" class="d-block w-100" alt="Grampians National Park">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Grampians National Park</h5>
                        <p>Grampians National Park</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="keppellookout.jpg" class="d-block w-100" alt="Keppel Lookout">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Keppel Lookout</h5>
                        <p>View from Keppel Lookout</p>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</div>

<?php
include ('./includes/footer.inc');
?>

<!-- Add Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
