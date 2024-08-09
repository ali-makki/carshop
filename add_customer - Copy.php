<?php
include('connection.php');

$username = $_POST['username'];
$password = $_POST['password'];

$query = "INSERT INTO customers (username, password) VALUES ('$username', '$password')";
if ($con->query($query) === TRUE) {
    echo "success";
} else {
    echo "error";
}

$con->close();
?>