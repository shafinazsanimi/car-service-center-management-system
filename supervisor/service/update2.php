<?php

session_start();
include_once('connectionDB.php');

    $id = $_POST["id"];
    $type = $_POST["type"];
    $sp_name = $_POST["sp_name"];
    $sp_used = $_POST["sp_used"];
    $vehicle = $_POST["vehicle"];
    $description = $_POST["description"];
    $fee = $_POST["fee"];
    $query = "UPDATE service SET svc_type='$type',sp_name='$sp_name',sp_used='$sp_used',vhc_name='$vehicle',svc_desc='$description',svc_installfees='$fee'
              WHERE svc_id='$id'";
    mysqli_query($con,$query);

    $log_username=$_SESSION['username'];
	
	mysqli_query($con,"INSERT INTO activitylog (log_activity,username,grant_level) 
	                   VALUES ('Updated a service details','$log_username','Supervisor')");

?>
