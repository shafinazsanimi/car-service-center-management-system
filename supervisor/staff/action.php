<?php 
	include 'connectionDB.php';
	$output='';

	if(isset($_POST['query'])){
		$search=$_POST['query'];
		$stmnt=$con->prepare("SELECT * FROM staff WHERE st_id LIKE CONCAT('%',?,'%') OR st_fullname LIKE CONCAT('%',?,'%')  
		OR st_contact LIKE CONCAT('%',?,'%') OR st_gender LIKE CONCAT('%',?,'%')");
		$stmnt->bind_param("ssss",$search,$search,$search,$search);
	}
	else{
		$stmnt=$con->prepare("SELECT * FROM staff");
	}
	$stmnt->execute();
	$result=$stmnt->get_result();

	if($result->num_rows>0){
		$output="<thead>
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>Contact Number</th>
						<th>Gender</th>
					</tr>
  				 </thead>
  				 <tbody>";
  				 while($row=$result->fetch_assoc()){
  				 	$output.="
					<tr class='clickable-row text-primary' data-href='/fyp/supervisor/staff/StDisplay.php?id=".$row['st_id']."'>
						<td><u>".$row['st_id']."</u></td>
						<td><u>".$row['st_fullname']."</u></td>
				 		<td><u>".$row['st_contact']."</u></td>
				 		<td><u>".$row['st_gender']."</u></td>
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
