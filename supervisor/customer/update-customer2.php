<?php

session_start();
include_once('connectionDB.php');

    $id = $_POST["id"];
    $name = $_POST["name"];
    $ic = $_POST["ic"];
    $contactno = $_POST["contactno"];
    $query = "UPDATE customer SET cust_name='$name',cust_ic='$ic',cust_contact='$contactno' WHERE cust_id='$id'";
    mysqli_query($con,$query);

    $log_username=$_SESSION['username'];
	
	mysqli_query($con,"INSERT INTO activitylog (log_activity,username,grant_level) 
	                   VALUES ('Updated a customer details','$log_username','Supervisor')");

?>
