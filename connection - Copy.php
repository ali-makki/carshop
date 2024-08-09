<?php
define("db_SERVER", "localhost");
define("db_USER","root");
define("db_PASSWORD","");
define("db_DBNAME" , "carshop");

$con = mysqli_connect(db_SERVER,db_USER , db_PASSWORD,db_DBNAME)
or die ("Error " . mysqli_error($con));

?>