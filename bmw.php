<?php
// connect to database
include('connection.php');
$bmw_query = "SELECT * FROM bmw";
$bmw_result = $con->query($bmw_query);
?>
<h2>BMW offers</h2>
<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Price</th>
        <?php while($row = $bmw_result->fetch_assoc()) { ?>
    <tr>
        <td><?php echo $row["id"]; ?></td>
        <td><?php echo $row["name"]; ?></td>
        <td><?php echo $row["price"]; ?></td>
        
    </tr>
    <?php } ?>
</table>
  