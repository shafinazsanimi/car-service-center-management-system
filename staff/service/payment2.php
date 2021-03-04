<?php

session_start();
include_once('connectionDB.php');

    $id = $_POST["svc_id"];
    
    $query = "UPDATE service SET svc_paymentstatus='Paid'
              WHERE svc_id='$id'";
    mysqli_query($con,$query);

    $log_username=$_SESSION['username'];
	
	mysqli_query($con,"INSERT INTO activitylog (log_activity,username,grant_level) 
	                   VALUES ('Updated a payment service','$log_username','Staff')");

?>