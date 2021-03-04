<?php

session_start();
include_once('connectionDB.php');

    $id = $_POST["delete_id"];
    $query = "DELETE FROM sparepart WHERE sp_id='$id'";
    mysqli_query($con,$query);

    $log_username=$_SESSION['username'];
	
	mysqli_query($con,"INSERT INTO activitylog (log_activity,username,grant_level) 
	                   VALUES ('Deleted a spare part','$log_username','Staff')");

?>