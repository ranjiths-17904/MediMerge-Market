<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php'); // Redirect to login page if not logged in
    exit();
}

echo "Welcome, you are logged in!";
?>

<a href="logout.php">Logout</a>
