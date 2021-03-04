<?php
	CRYPT_BLOWFISH or die ('No Blowfish found.');
	session_start();
	include("connectionDB.php");
   
	$username=mysqli_real_escape_string($con,$_POST['username']);
	$password=mysqli_real_escape_string($con,$_POST['password']);
	$login=$_GET['login']; 
	
	$username=trim($username);
	$password=trim($password);
          
	if($login=='yes')
	{
		$Blowfish_Pre='$2a$05$';
		$Blowfish_End='$';

		$get1="SELECT sv_salt,sv_password FROM supervisor WHERE sv_username='$username'";
		$result1=mysqli_query($con,$get1) or die($conerror);
		$row1=mysqli_fetch_assoc($result1); 
		$hashed_pass1=crypt($password, $Blowfish_Pre . $row1['sv_salt'] . $Blowfish_End);

		$get2="SELECT st_id,st_salt,st_password FROM staff WHERE st_username='$username'"; 
		$result2=mysqli_query($con,$get2) or die($conerror);  
		$row2=mysqli_fetch_assoc($result2); 
		$hashed_pass2=crypt($password, $Blowfish_Pre . $row2['st_salt'] . $Blowfish_End);

		if($hashed_pass1 == $row1['sv_password'])
		{
			setcookie("username","$username",time()+36000 , "/");

			$_SESSION['username']=$_POST['username'];
			$username=$_POST['username'];
			$password=$_POST['password'];
	
			mysqli_query($con,"INSERT INTO activitylog (log_activity,username,grant_level) 
			                   VALUES ('Logged in to the system','$username','Supervisor')");
			
			?>	
			<script type="text/javascript">

			alert("Welcome Supervisor");
			window.location='/fyp/supervisor/dashboard/index.php';
				 
			</script>		
			<?php    
		}
		elseif($hashed_pass2 == $row2['st_password'])
		{
			setcookie("username", "$username" ,time()+36000 , "/");
		 
			$_SESSION['username']=$_POST['username'];
			$_SESSION["staff_id"] = $row2["st_id"];
			$username=$_POST['username'];
			$password=$_POST['password'];
	
			mysqli_query($con,"INSERT INTO activitylog (log_activity,username,grant_level) 
							   VALUES ('Logged in to the system','$username','Staff')");
			
			?>            
			<script type="text/javascript">

			alert("Welcome Staff");
			window.location='/fyp/staff/dashboard/index.php';
				 
			</script>		
			<?php 
		}
		else
		{
			?>
			<script type="text/javascript">

			alert("Your username or password is invalid!");
			window.location='/fyp/login/index.php';
			
			</script>
			<?php
		}
	}
?>