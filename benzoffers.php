<?php

include('connection.php');


$benz_query = "SELECT * FROM benz";


$benz_result = $con->query($benz_query);


?>

<h1>Cars Information</h1>

<h2>Mercedes-Benz</h2>
<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Price</th>
    </tr>
    <?php while($row = $benz_result->fetch_assoc()) { ?>
    <tr>
        <td><?php echo $row["id"]; ?></td>
        <td><?php echo $row["name"]; ?></td>
        <td><?php echo $row["price"]; ?></td>
      
    </tr>
    <?php } ?>
</table>


