<?php
// export.php
include 'connection.php';

$output = '';

$queryBMW= "SELECT * FROM BMW ORDER BY 1 DESC";
$queryrover= "SELECT * FROM range_rover ORDER BY 1 DESC";
$queryBenz= "SELECT * FROM Benz ORDER BY 1 DESC";
$result1 = mysqli_query($con, $queryBMW);
$result2= mysqli_query($con, $queryBenz);
$result3 = mysqli_query($con, $queryrover);
if (mysqli_num_rows($result1) > 0) {
    $output .= '
    <table bordered="1">  
        <tr>  
            <th>model</th>  
            <th>price</th>  
            
           
        </tr>
    ';

    while ($row = mysqli_fetch_array($result1)) {
        $output .= '
        <tr>  
            <td>' . $row["name"] . '</td>  
            <td>' . $row["price"] . '</td>  
         
        </tr>
        ';
    }

    $output .= '</table>';

    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment; filename="Carshop_Customers.xls"');
    echo $output;
}
if (mysqli_num_rows($result2) > 0) {
    $output .= '
    <table bordered="1">  
        <tr>  
            <th>model</th>  
            <th>price</th>  
            
           
        </tr>
    ';

    while ($row = mysqli_fetch_array($result2)) {
        $output .= '
        <tr>  
            <td>' . $row["name"] . '</td>  
            <td>' . $row["price"] . '</td>  
         
        </tr>
        ';
    }

    $output .= '</table>';

    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment; filename="Carshop_Customers.xls"');
    echo $output;
}
if (mysqli_num_rows($result3) > 0) {
    $output .= '
    <table bordered="1">  
        <tr>  
            <th>model</th>  
            <th>price</th>  
            
           
        </tr>
    ';

    while ($row = mysqli_fetch_array($result3)) {
        $output .= '
        <tr>  
            <td>' . $row["name"] . '</td>  
            <td>' . $row["price"] . '</td>  
         
        </tr>
        ';
    }

    $output .= '</table>';

    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment; filename="Carshop_Customers.xls"');
    echo $output;
}
?>