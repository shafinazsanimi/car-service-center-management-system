<?php

session_start();
include_once('connectionDB.php');

    $id = $_POST["delete_id"];
    $query = "DELETE FROM customer WHERE cust_id='$id'";
    mysqli_query($con,$query);

    $log_username=$_SESSION['username'];
	
	mysqli_query($con,"INSERT INTO activitylog (log_activity,username,grant_level) 
	                   VALUES ('Deleted a customer','$log_username','Supervisor')");

?>
