<?php 
	include 'connectionDB.php';
	$output='';

	if(isset($_POST['query'])){
		$search=$_POST['query'];
		$stmnt=$con->prepare("SELECT * FROM activitylog 
		WHERE log_id LIKE CONCAT('%',?,'%') OR log_datetime LIKE CONCAT('%',?,'%')  
		OR log_activity LIKE CONCAT('%',?,'%') OR username LIKE CONCAT('%',?,'%') 
		OR grant_level LIKE CONCAT('%',?,'%')");
		$stmnt->bind_param("sssss",$search,$search,$search,$search,$search);
	}
	else{
		$stmnt=$con->prepare("SELECT * FROM activitylog");
	}
	$stmnt->execute();
	$result=$stmnt->get_result();

	if($result->num_rows>0){
		$output="<thead>
					<tr>
						<th>ID
						<th>Username
						<th>Grant Level
						<th>Date & Time 
						<th>Activity
					</tr>
  				 </thead>
  				 <tbody>";
  				 while($row=$result->fetch_assoc()){
  				 	$output.="
					<tr>
  				 		<td>".$row['log_id']."</td>
						<td>".$row['username']."</td>
					    <td>".$row['grant_level']."</td>
  				 		<td>".$row['log_datetime']."</td>
						<td>".$row['log_activity']."</td>
  				 	</tr>";
  				}
  		 $output.="</tbody>";
  		 echo $output;
	}
	else{
		echo "<h5>No Record Found!</h5>";
	}
?>