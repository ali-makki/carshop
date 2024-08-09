<?php
// Connect to the database
include('connection.php');
// Get the posted data
$id = $_GET['id'];
$table = $_GET['table'];

// Delete the row from the database
$query = "DELETE FROM $table WHERE id = '$id'";
mysqli_query($con, $query);

// Close the connection
mysqli_close($con);

?>