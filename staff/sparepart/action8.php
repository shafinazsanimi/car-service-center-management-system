<?php 
	include 'connectionDB.php';
	$output='';

	if(isset($_POST['query'])){
		$search=$_POST['query'];
		$stmnt=$con->prepare("SELECT * FROM sparepart WHERE sp_id LIKE CONCAT('%',?,'%') OR sp_type LIKE CONCAT('%',?,'%')  
		OR sp_brand LIKE CONCAT('%',?,'%') OR sp_desc LIKE CONCAT('%',?,'%') OR sp_stock LIKE CONCAT('%',?,'%')");
		$stmnt->bind_param("sssss",$search,$search,$search,$search,$search);
	}
	else{
		$stmnt=$con->prepare("SELECT * FROM sparepart WHERE sp_type='Tail Lamp'");
	}
	$stmnt->execute();
	$result=$stmnt->get_result();

	if($result->num_rows>0){
		$output="<thead>
					<tr>
						<th>ID</th>
						<th>Type</th>
						<th>Brand</th>
						<th>Description</th>
						<th>Stock</th>
					</tr>
  				 </thead>
  				 <tbody>";
  				 while($row=$result->fetch_assoc()){
  				 	$output.="
					<tr class='clickable-row text-primary' data-href='/fyp/supervisor/sparepart/SparePartDisplay8.php?id=".$row['sp_id']."'>
  				 		<td><u>".$row['sp_id']."</u></td>
  				 		<td><u>".$row['sp_type']."</u></td>
						<td><u>".$row['sp_brand']."</u></td>
						<td><u>".$row['sp_desc']."</u></td>
						<td><u>".$row['sp_stock']."</u></td>
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