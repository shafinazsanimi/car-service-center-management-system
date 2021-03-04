<?php

    session_start();
    include_once('connectionDB.php');

    if(isset($_POST["add_rec"]))
    {
        $type = $_POST["type"];
        $brand = $_POST["brand"];
        $description = $_POST["description"];
        $price = $_POST["price"];
        $stock = $_POST["stock"];

        $target_dir = "images/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

        if(preg_match("!image!", $_FILES["fileToUpload"]["type"]))
        {
            if(copy($_FILES["fileToUpload"]["tmp_name"],$target_file))
            {
                mysqli_query($con,"INSERT INTO sparepart (sp_type, sp_brand, sp_desc, sp_price, sp_stock, sp_image)
                VALUES ('$type','$brand','$description','$price','$stock','$target_file')");
                ?>
                <script type="text/javascript">
                alert("Spare part detail has been successfully added!");
            	window.location="/fyp/staff/sparepart/SparePartList0.php";
				</script>
                <?php
            }
            else{
                ?>
                <script type="text/javascript">
                alert("Spare part detail failed to add!");
            	window.location="/fyp/staff/sparepart/SparePartList0.php";
				</script>
                <?php
            }
        }

        $log_username=$_SESSION['username'];
        
        mysqli_query($con,"INSERT INTO activitylog (log_activity,username,grant_level) 
                        VALUES ('Added a spare part','$log_username','Staff')");
    }

?>