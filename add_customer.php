<?php
$db_host = 'localhost';
$db_username = 'root';
$db_password = '';
$db_name = 'carshop';

$conn = new mysqli($db_host, $db_username, $db_password, $db_name);

if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
}

$username = $_POST['username'];
$password = $_POST['password'];

$query = "INSERT INTO customers (username, password) VALUES ('$username', '$password')";
if ($conn->query($query) === TRUE) {
    echo "success";
} else {
    echo "error";
}

$conn->close();
?>