<?php
// delete_customer.php

// Database connection settings
include('connection.php');
// Get the username from the POST request
$username = $_POST['username'];

// Delete the customer from the database
$query = "DELETE FROM customers WHERE username='$username'";
if ($con->query($query) === TRUE) {
    echo "Customer deleted successfully";
} else {
    echo "Error deleting customer: " . $con->error;
}

// Close connection
$con->close();

// Redirect back to the admin dashboard
header('Location: admin.php');
exit;
?>