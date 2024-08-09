<?php
// connect to database
include('connection.php');
$rangerover_query = "SELECT * FROM range_rover";
$rangerover_result = $con->query($rangerover_query);
?>
<h2>Range-Rover offers</h2>
<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Price</th>
        
    </tr>
    <?php while($row = $rangerover_result->fetch_assoc()) { ?>
    <tr>
        <td><?php echo $row["id"]; ?></td>
        <td><?php echo $row["name"]; ?></td>
        <td><?php echo $row["price"]; ?></td>
        
    </tr>
    <?php } ?>
</table>