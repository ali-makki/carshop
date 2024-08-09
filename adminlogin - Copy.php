<?php

// Configuration
include('connection.php');
// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare and bind
    $stmt = $con->prepare("SELECT * FROM admins WHERE adminname = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // User found, login successful
        $user_data = $result->fetch_assoc();
        session_start();
        $_SESSION['logged_in']=true;
        header('Location: admin.php');
        exit;
    } else {
        // User not found, login failed
        header('Location: adminlogin.html');
    }
}

// Close connection
$con->close();
?>