<?php
// Connect to the database
include('connection.php');
// Check if the form has been submitted
if (isset($_POST['submit'])) {
    // Get the data from the form
    $table = $_POST['model'];
    $name = $_POST['name'];
    $price = $_POST['price'];

    // Check if all fields are filled
    if (!empty($table) && !empty($name) && !empty($price)) {
        // Add a new offer to the database
        $query = "INSERT INTO $table (name, price) VALUES ('$name', '$price')";
        mysqli_query($conn, $query);

        // Close the connection
        mysqli_close($conn);

        // Redirect to editoffers-copy.php
        header('Location: editoffers - Copy.php');
        exit;
    } else {
        // Display an error message
        $error = 'Please fill all fields!';
        header('location:editoffers - Copy.php');
    }
}
?>

<?php if (isset($error)): ?>
    <script>alert('<?php echo $error; ?>');</script>
<?php endif; ?>

