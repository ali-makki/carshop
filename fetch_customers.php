<?php
include('connection.php');
$query = "SELECT * FROM customers";
$result = $con->query($query);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>". $row["username"]. "</td>";
        echo "<td>". $row["password"]. "</td>";
        echo "<td>";
        echo "<form action='delete_customer.php' method='post'>";
        echo "<input type='hidden' name='username' value='". $row["username"]. "'>";
        echo "<input type='submit' value='Delete'>";
        echo "</form>";
        echo " ";
        echo "<form action='edit_customer.php' method='post'>";
        echo "<input type='hidden' name='username' value='". $row["username"]. "'>";
        echo "</form>";
        echo "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='3'>No customers found</td></tr>";
}

$con->close();
?>