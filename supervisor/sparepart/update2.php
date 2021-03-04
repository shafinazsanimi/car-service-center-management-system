<?php

    session_start();
    include_once('connectionDB.php');

    $id = $_POST["id"];
    $type = $_POST["type"];
    $brand = $_POST["brand"];
    $description = $_POST["description"];
    $price = $_POST["price"];
    $stock = $_POST["stock"];
    $query = "UPDATE sparepart SET sp_type='$type',sp_brand='$brand',sp_desc='$description',sp_price='$price',sp_stock='$stock' WHERE sp_id='$id'";
    mysqli_query($con,$query);

    $log_username=$_SESSION['username'];
	
	mysqli_query($con,"INSERT INTO activitylog (log_activity,username,grant_level) 
                       VALUES ('Updated a spare part details','$log_username','Supervisor')");
                       
?>
