<?php
CRYPT_BLOWFISH or die ('No Blowfish found.');
session_start();
include("connectionDB.php");

if(!($_SESSION['username']))
{
  header('Location: /fyp/login/index.php');
}
    
	if (isset($_POST["signup"]))
	{
		if(empty ($_POST['agree-term']))
		{
			?>
			<script type="text/javascript">
			alert("Please agree the Term and Condition (T&C)");
			</script>
			<?php
		}
		else
		{    
			$username=mysqli_real_escape_string($con,$_POST['username']);
			$name=mysqli_real_escape_string($con,$_POST['fullname']);
			$password=mysqli_real_escape_string($con,$_POST['password']);
	 
			$get=mysqli_query($con,"SELECT st_id FROM staff WHERE st_username='$username'");
			$result=mysqli_num_rows($get);
 
			if($result!=0)
			{	
				?>
				<script>
				alert("Username are unavailable, please choose different username.");
				 </script>
				<?php
			}
			else
			{
				//This string tells crypt to use blowfish for 5 rounds.
				$Blowfish_Pre='$2a$05$';
				$Blowfish_End='$';

				//Blowfish accepts these characters for salts.
				$Allowed_Chars='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789./';
				$Chars_Len=63;

				//18 would be secure as well.
				$Salt_Length=21;
				$salt="";

				for($i=0; $i<$Salt_Length; $i++)
				{
   					$salt .= $Allowed_Chars[mt_rand(0,$Chars_Len)];
				}

				$bcrypt_salt=$Blowfish_Pre . $salt . $Blowfish_End;

				$hashed_password=crypt($password, $bcrypt_salt);

				$sql='INSERT INTO staff (st_username,st_fullname,st_salt,st_password)' .
					 "VALUES ('$username','$name','$salt','$hashed_password')";
				 
				mysqli_query($con,$sql) or die($conerror);

				$log_username=$_SESSION['username'];
	
				mysqli_query($con,"INSERT INTO activitylog (log_activity,username,grant_level) 
				                   VALUES ('Registered a staff','$log_username','Supervisor')");
				
				?>				
				<script type="text/javascript">
				alert("Staff are registered!");
            	window.location="/fyp/supervisor/staff/StList.php";
				</script>
				<?php
			}
		}	  
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Staff Registration</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

        <!-- Sign up form -->
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Register Staff</h2>
                        <form method="POST" class="register-form" id="register-form">
                            <div class="form-group">
                                <label for="username"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="username" id="username" placeholder="Username"/>
                            </div>
                            <div class="form-group">
                                <label for="fullname"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="fullname" id="fullname" placeholder="Full Name"/>
                            </div>
                            <div class="form-group">
                                <label for="password"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="password" required="true" placeholder="Password"/>
                            </div>
                            <div class="form-group">
                                <label for="password"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="password" id="confirm_password" required="true" placeholder="Re-type password"/>
                            </div>
                            <!-- <div class="form-group">
								<div class="hide-show">
								<button type="button" width="80px" height="30px"><span>Show Password</span></button>
								</div>
							</div>	-->
                            <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term"/>
                                <label for="agree-term" class="label-agree-term"><span></span>I agree all the <a href="T&C.pdf" class="term-service-primary">Terms & Conditions</a></label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" class="form-submit" value="Register"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="images/signup-image.jpg" alt="sing up image"></figure>
                    </div>
                </div>
            </div>
			
<script>
$(document).ready(function(){
	$('.w3_play_icon,.w3_play_icon1,.w3_play_icon2').magnificPopup({
		type: 'inline',
		fixedContentPos: false,
		fixedBgPos: true,
		overflowY: 'auto',
		closeBtnInside: true,
		preloader: false,
		midClick: true,
		removalDelay: 300,
		mainClass: 'my-mfp-zoom-in'
	});																
});
</script>
<script>
$(function(){
	$('.hide-show').show();
	$('.hide-show span').addClass('show')
	$('.hide-show span').click(function()
	{
		if($(this).hasClass('show'))
		{
			$(this).text('Hide');
			$('input[name="password"]').attr('type','text');
			$(this).removeClass('show');
		}
		else
		{
			$(this).text('Show');
			$('input[name="password"]').attr('type','password');
			$(this).addClass('show');
		}
	});
});
</script>
<script>
var password=document.getElementById("password"), 
	confirm_password=document.getElementById("confirm_password");

function validatePassword()
{
	if(password.value != confirm_password.value)
	{
		confirm_password.setCustomValidity("Password don't match!");
	}
	else
	{
		confirm_password.setCustomValidity('');
	}
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
</script>
        

                   
    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>