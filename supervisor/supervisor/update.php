<?php

include_once('connectionDB.php');

    if(isset($_POST["id"]))  
    {  
        $query = "SELECT * FROM supervisor WHERE sv_id = '".$_POST["id"]."'";  
        $result = mysqli_query($con, $query);  
        $row = mysqli_fetch_array($result);  
        echo json_encode($row);  
    } 

?>