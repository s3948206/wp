<?php
include './include/db_connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <!-- Navigation -->
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
        <form id="form" method="get" action="search.php">
            <input type="search" id="query" name="q" placeholder="Search...">
            <button>Search</button>
        </form>
    </nav>
</header>

<h3>Register</h3>
<p>Please enter your details to create an account</p>

<form action="register.php" method="post" class="custom">
    <div>
        <label for="username">Username:</label>
        <br>
        <input type="text" id="username" name="username" placeholder="Enter your username" required>
    </div>
    <br>
    <div>
        <label for="password">Password:</label>
        <br>
        <input type="password" id="password" name="password" placeholder="Enter your password" required>
    </div>
    <br>
    <input type="submit" value="Register" style="background-color: blue; color: white;">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = sha1($_POST['password']); // Hashing the password
    $reg_date = date('Y-m-d H:i:s');

    // Prepare SQL statement to prevent SQL injection
    $sql = $conn->prepare("INSERT INTO users (username, password, reg_date) VALUES (?, ?, ?)");
    $sql->bind_param("sss", $username, $password, $reg_date);

    if ($sql->execute()) {
        echo "Registration successful. You can now <a href='login.php'>login</a>.";
    } else {
        echo "Error: " . $sql->error;
    }

    $sql->close();
}

// Close database connection
mysqli_close($conn);
?>

</body>
</html>
