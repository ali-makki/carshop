<?php
// Connect to the database
include('connection.php');

// Retrieve data from the tables
$bmw_query = "SELECT * FROM BMW";
$range_rover_query = "SELECT * FROM range_rover";
$benz_query = "SELECT * FROM Benz";

$bmw_result = mysqli_query($con, $bmw_query);
$range_rover_result = mysqli_query($con, $range_rover_query);
$benz_result = mysqli_query($con, $benz_query);

// Display the data in tables
?>
<h2>Edit Offers</h2>
<h3>BMW</h3>
<table id="bmw-table">
    <tr>
        <th>ID</th>
        <th>name</th>
        <th>Price</th>
        <th>Actions</th>
    </tr>
    <?php while($row = mysqli_fetch_assoc($bmw_result)) {?>
    <tr>
        <td><?php echo $row['id'];?></td>
        <td><?php echo $row['name'];?></td>
        <td><?php echo $row['price'];?></td>
        <td>
            <button class="edit-btn" data-id="<?php echo $row['id'];?>" data-table="BMW">Edit</button>
            <button class="delete-btn" data-id="<?php echo $row['id'];?>" data-table="BMW">Delete</button>
         
        </td>
    </tr>
    <?php }?>
</table>

<h3>Range Rover</h3>
<table id="range-rover-table">
    <tr>
        <th>ID</th>
        <th>Model</th>
        <th>Price</th>
        <th>Actions</th>
    </tr>
    <?php while($row = mysqli_fetch_assoc($range_rover_result)) {?>
    <tr>
        <td><?php echo $row['id'];?></td>
        <td><?php echo $row['name'];?></td>
        <td><?php echo $row['price'];?></td>
        <td>
            <button class="edit-btn" data-id="<?php echo $row['id'];?>" data-table="range_rover">Edit</button>
            <button class="delete-btn" data-id="<?php echo $row['id'];?>" data-table="range_rover">Delete</button>
        </td>
    </tr>
    <?php }?>
</table>

<h3>Benz</h3>
<table id="benz-table">
    <tr>
        <th>ID</th>
        <th>Model</th>
        
        <th>Price</th>
        <th>Actions</th>
    </tr>
    <?php while($row = mysqli_fetch_assoc($benz_result)) {?>
    <tr>
        <td><?php echo $row['id'];?></td>
        <td><?php echo $row['name'];?></td>
        
        <td><?php echo $row['price'];?></td>
        <td>
            <button class="edit-btn" data-id="<?php echo $row['id'];?>" data-table="Benz">Edit</button>
            <button class="delete-btn" data-id="<?php echo $row['id'];?>" data-table="Benz">Delete</button>
        </td>
    </tr>
    <?php }?>
</table>
<h2>Add New Customer</h2>
<form action="addoffer.php" method="post">
    <label for="model">Model:</label>
    <input type="text" id="model" name="model"><br><br>
    <label for="name">Name:</label>
    <input type="text" id="name" name="name"><br><br>
    <label for="price">Price:</label>
    <input type="text" id="price" name="price"><br><br>
    <input type="submit" name="submit" value="Add Offer">
</form>
        <!-- Add code for benz, range-rover, and bmw tables here -->
    </div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function() {
        // Edit offer
        $(".edit-btn").click(function() {
            var id = $(this).data("id");
            var table = $(this).data("table");
            var row = $(this).closest("tr");
            var nameCell = row.find("td:eq(1)");
            var priceCell = row.find("td:eq(2)");
            
            // Make the cells editable
            nameCell.html("<input type='text' value='" + nameCell.text() + "'>");
            priceCell.html("<input type='text' value='" + priceCell.text() + "'>");
            
            // Add a save button
            var saveBtn = $("<button>Save</button>");
            row.find("td:last-child").append(saveBtn);
            
            // Save button click event
            saveBtn.click(function() {
                var name = nameCell.find("input").val();
                var price = priceCell.find("input").val();
                this.remove();
                $.ajax({
                    type: "POST",
                    url: "edit.php",
                    data: {
                        id: id,
                        table: table,
                        name: name,
                        price: price
                    },
                    success: function(data) {
                console.log("Data updated successfully!");
                // Reset the cells to non-editable state
                nameCell.text(name);
                priceCell.text(price);
                // Remove the save button
                saveBtn.remove();
                // Remove the edit button and add it back
                $(this).closest("td").find(".edit-btn").remove();
                $(this).closest("td").append("<button class='edit-btn' data-id='" + id + "' data-table='" + table + "'>Edit</button>");
            }
        });
                });
            });
        });

        // Delete offer
        $(".delete-btn").click(function() {
            var id = $(this).data("id");
            var table = $(this).data("table");
            $.ajax({
                type: "GET",
                url: "deleteoffer.php",
                data: {id: id, table: table},
                success: function(data) {
                    // Remove the row from the table
                    $(this).closest("tr").remove();
                    location.reload();
                }
            });
        });
    
</script>

<!-- Edit form container -->
<div id="edit-form"></div>

<?php
// Close the connection
mysqli_close($con);
?>