<?php

// Configuration
$db_host = 'localhost';
$db_username = 'root';
$db_password = '';
$db_name = 'carshop';

// Create connection
$conn = new mysqli($db_host, $db_username, $db_password, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare and bind
    $stmt = $conn->prepare("SELECT * FROM customers WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // User found, login successful
        session_start();
        $user_data = $result->fetch_assoc();
        $_SESSION['logged_in'] = true;
        header('Location: offers.php');
        setcookie('username', $username, time() + 3600); 
        exit;
    } else {
        // User not found, login failed
        header('Location: login.html');
    }
}

// Close connection
$conn->close();
?>