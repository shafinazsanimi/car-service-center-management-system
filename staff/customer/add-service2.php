<?php

    session_start();
    include_once('connectionDB.php');

    $type = $_POST["type"];
    $description = $_POST["description"];
    $sp_name = $_POST["sp_name"];
    $sp_used = $_POST["sp_used"];
    $vehicle = $_POST["vehicle"];
    $fee = $_POST["fee"];
    $cust_id = $_POST["cust_id"];

    $query = "INSERT INTO service(svc_type, svc_desc, sp_name, sp_used, vhc_name, svc_installfees, cust_id, svc_paymentstatus) 
              VALUES('$type', '$description', '$sp_name', '$sp_used', '$vehicle', '$fee', '$cust_id', 'Pending')";
    mysqli_query($con,$query);

    $query2 = "SELECT sp_stock FROM sparepart WHERE sp_desc='$sp_name'";
    $result=mysqli_query($con,$query2);
    while($row=mysqli_fetch_assoc($result)){
        $updstock = $row['sp_stock'] - $sp_used;
    }
    
    $query3 = "UPDATE sparepart SET sp_stock='$updstock' WHERE sp_desc='$sp_name'";
    mysqli_query($con,$query3);

    $log_username=$_SESSION['username'];
	
	mysqli_query($con,"INSERT INTO activitylog (log_activity,username,grant_level) 
	                   VALUES ('Added a service','$log_username','Staff')");
    
?>