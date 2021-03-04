<?php

session_start();
include_once('connectionDB.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    if(isset($_POST["name"]) && isset($_POST["ic"]) && isset($_POST["contactno"]))
    {
        $name = mysqli_real_escape_string($con, $_POST["name"]);
        $ic = mysqli_real_escape_string($con, $_POST["ic"]);
        $contactno = mysqli_real_escape_string($con, $_POST["contactno"]);
        $query = "INSERT INTO customer(cust_name, cust_ic, cust_contact) 
                  VALUES('$name', '$ic', '$contactno')";
        mysqli_query($con,$query);

        $log_username=$_SESSION['username'];
	
	    mysqli_query($con,"INSERT INTO activitylog (log_activity,username,grant_level) 
	                       VALUES ('Added a customer','$log_username','Staff')");
    }

}

?>