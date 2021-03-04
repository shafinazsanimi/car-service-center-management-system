<?php

$host="localhost";
$user="root";
$password="";

$conerror = 'Sorry, we are experiencing connection issues.';
$con = mysqli_connect($host,$user,$password);
mysqli_select_db($con,"carservicecenter") or die($conerror);

?>