<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "medico";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepared statement
    $stmt = $conn->prepare("SELECT id, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $hashed_password);
        $stmt->fetch();

        if (password_verify($password, $hashed_password)) {
            // Start session and store user id
            $_SESSION['user_id'] = $id;
            echo "Login successful!";
            header('Location: medico.html');
        } else {
            echo "Invalid email or password.";
            header('Location: login.php');
        }
    } else {
        echo "Invalid email or password.";
        header('Location: login.php');
    }

    $stmt->close();
}

$conn->close();
?>
