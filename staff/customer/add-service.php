<?php

include_once('connectionDB.php');

    if(isset($_POST["id"]))  
    {  
        $query = "SELECT cust_id FROM customer WHERE cust_id = '".$_POST["id"]."'";  
        $result = mysqli_query($con, $query);  
        $row = mysqli_fetch_array($result);  
        echo json_encode($row);  
    } 

?>