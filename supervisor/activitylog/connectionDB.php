<?php

$con=new mysqli("localhost","root","","carservicecenter");
if($con->connect_error){
	die("Sorry, we are experiencing connection issues.".$con->connect_error);
}

?>