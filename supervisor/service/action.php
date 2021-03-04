<?php 
	include 'connectionDB.php';
	$output='';

	if(isset($_POST['query'])){
		$search=$_POST['query'];
		$stmnt=$con->prepare("SELECT * FROM service INNER JOIN customer ON service.cust_id = customer.cust_id 
		WHERE svc_id LIKE CONCAT('%',?,'%') OR svc_type LIKE CONCAT('%',?,'%') OR svc_desc LIKE CONCAT('%',?,'%') 
		OR cust_name LIKE CONCAT('%',?,'%') OR svc_paymentstatus LIKE CONCAT('%',?,'%')");
		$stmnt->bind_param("sssss",$search,$search,$search,$search,$search);
	}
	else{
		$stmnt=$con->prepare("SELECT * FROM service INNER JOIN customer ON service.cust_id = customer.cust_id");
	}
	$stmnt->execute();
	$result=$stmnt->get_result();

	if($result->num_rows>0){
		$output="<thead>
					<tr>
						<th>ID</th>
						<th>Type</th>
						<th>Description</th>
						<th>Customer Name</th>
						<th>Payment Status</th>
					</tr>
  				 </thead>
  				 <tbody>";
  				 while($row=$result->fetch_assoc()){
  				 	$output.="
					<tr class='clickable-row text-primary' data-href='/fyp/supervisor/service/display.php?id=".$row['svc_id']."'>
  				 		<td><u>".$row['svc_id']."</u></td>
  				 		<td><u>".$row['svc_type']."</u></td>
						<td><u>".$row['svc_desc']."</u></td>
						<td><u>".$row['cust_name']."</u></td>
						<td><u>".$row['svc_paymentstatus']."</u></td>
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
