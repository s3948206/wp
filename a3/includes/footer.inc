<?php
// Start the session if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<div class="f1">
    <footer>
        <p>&copy; s3948206 Matthew Leviste Raagas</p>
        <?php if (isset($_SESSION['username'])): ?>
            <p>
                Logged in as: <a href="user.php?user=<?php echo urlencode($_SESSION['username']); ?>">
                    <?php echo htmlspecialchars($_SESSION['username']); ?>
                </a>
            </p>
        <?php endif; ?>
    </footer>
</div>

</body>

</html>