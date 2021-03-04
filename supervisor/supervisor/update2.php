<?php

session_start();
include_once('connectionDB.php');

    $id = $_POST["id"];
    $fullname = $_POST["fullname"];
    $contactno = $_POST["contactno"];
    $gender = $_POST["gender"];
    $query = "UPDATE supervisor SET sv_fullname='$fullname',sv_contact='$contactno',sv_gender='$gender' WHERE sv_id='$id'";
    mysqli_query($con,$query);

    $log_username=$_SESSION['username'];
	
	mysqli_query($con,"INSERT INTO activitylog (log_activity,username,grant_level) 
	                   VALUES ('Updated their profile','$log_username','Supervisor')");

?>
