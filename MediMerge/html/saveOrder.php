<?php
$servername = "localhost";
$username = "root"; // Default XAMPP username
$password = ""; // Default XAMPP password
$dbname = "medico";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$orderID = $_POST['orderID'];
$cardNumber = isset($_POST['cardNumber']) ? $_POST['cardNumber'] : '';
$orderDate = $_POST['orderDate'];
$orderTotal = $_POST['orderTotal'];
$shippingAddress = $_POST['shippingAddress'];

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO orders (orderID, orderDate, orderTotal, shippingAddress) VALUES (?, ?, ?, ?)");
$stmt->bind_param("isss", $orderID, $orderDate, $orderTotal, $shippingAddress);

if ($stmt->execute()) {
    $message = "New record created successfully";
} else {
    $message = "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Order Submission</title>
    <script type="text/javascript">
        alert("<?php echo $message; ?>");
        window.location.href = "confirmation.html";
    </script>
</head>
<body>
</body>
</html>
