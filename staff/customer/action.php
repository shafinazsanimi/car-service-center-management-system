<?php 
	include 'connectionDB.php';
	$output='';

	if(isset($_POST['query'])){
		$search=$_POST['query'];
		$stmnt=$con->prepare("SELECT * FROM customer WHERE cust_id LIKE CONCAT('%',?,'%') OR cust_name LIKE CONCAT('%',?,'%')  
		OR cust_ic LIKE CONCAT('%',?,'%') OR cust_contact LIKE CONCAT('%',?,'%')");
		$stmnt->bind_param("ssss",$search,$search,$search,$search);
	}
	else{
		$stmnt=$con->prepare("SELECT * FROM customer");
	}
	$stmnt->execute();
	$result=$stmnt->get_result();

	if($result->num_rows>0){
		$output="<thead>
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>IC Number</th>
						<th>Contact Number</th>
					</tr>
  				 </thead>
  				 <tbody>";
  				 while($row=$result->fetch_assoc()){
  				 	$output.="
					<tr class='clickable-row text-primary' data-href='/fyp/staff/customer/CustomerDisplay.php?id=".$row['cust_id']."'>
  				 		<td><u>".$row['cust_id']."</u></td>
  				 		<td><u>".$row['cust_name']."</u></td>
						<td><u>".$row['cust_ic']."</u></td>
						<td><u>".$row['cust_contact']."</u></td>
  				 	</tr>";
  				}
  		 $output.="</tbody>";
  		 echo $output;
	}
	else{
		echo "<h5>No Record Found!</h5>";
	}
?>

<script>
		jQuery(document).ready(function($) {
    		$(".clickable-row").click(function() {
        		window.location = $(this).data("href");
    		});
		});
</script>