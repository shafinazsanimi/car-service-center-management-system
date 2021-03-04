<?php

session_start();
include_once('connectionDB.php');

    $id = $_POST["id"];
    $fullname = $_POST["fullname"];
    $contactno = $_POST["contactno"];
    $gender = $_POST["gender"];
    $query = "UPDATE staff SET st_fullname='$fullname',st_contact='$contactno',st_gender='$gender' WHERE st_id='$id'";
    mysqli_query($con,$query);

    $log_username=$_SESSION['username'];
	
	mysqli_query($con,"INSERT INTO activitylog (log_activity,username,grant_level) 
	                   VALUES ('Updated their profile','$log_username','Staff')");

?>
