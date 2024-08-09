<?php

$db_host = 'localhost';
$db_username = 'root';
$db_password = '';
$db_name = 'carshop';


$conn = new mysqli($db_host, $db_username, $db_password, $db_name);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    if (empty($username) || empty($password)) {
        echo "Please fill in all fields.";
    } else {
        
        $query = "SELECT * FROM customers WHERE username = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "Username already exists. Please choose a different username.";
        } else {
            
            $query = "INSERT INTO customers (username, password) VALUES (?, ?)";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("ss", $username, $password);
            $stmt->execute();

            echo "User registered successfully!";
            header('location:login.html');
        }
    }
}


$conn->close();
?>