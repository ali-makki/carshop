<?php
// Connect to the database
include('connection.php');

// Retrieve the form data
$id = $_POST['id'];
$table = $_POST['table'];
$model = $_POST['name'];
$price = $_POST['price'];

// Update the offer data in the database
$query = "UPDATE $table SET name = '$model', price = '$price' WHERE id = '$id'";
mysqli_query($con, $query);

// Close the connection
mysqli_close($con);
?>