<?php
session_start();
include("connectionDB.php");

if(!($_SESSION['username']))
{
  header('Location: /fyp/login/index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Spare Part</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>


</head>
<body>
	<nav class="navbar navbar-inverse">
	  <div class="container-fluid">
		<h4 class="navbar-text">CSCMS</h4>
		<ul class="nav navbar-nav">
		  <li class="active"><a href="../dashboard/index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
		</ul>
	   
	  </div>
	</nav>
    
	
<div class="container">
  <img class="img-fluid" src="images/car.jpg" width="95%" height="550"> 
	<button onclick="window.location.href='SparePartList1.php'" class="btn button1">Tyre</button>
	<button class="btn button2">Bumper</button>
	<button class="btn button3">Side Mirror</button>
	<button class="btn button4">Door</button>
	<button class="btn button5">Handle</button>
	<button class="btn button6">Rim</button>
	<button class="btn button7">Muffler</button>
	<button onclick="window.location.href='SparePartList8.php'" class="btn button8">Tail Light</button>
	<button class="btn button9">Fuel Tank</button>
	<button class="btn button10">Roof</button>
	<button class="btn button11">Window</button>
	<button class="btn button12">Antenna</button>
	<button class="btn button13">Windsheild</button>
	<button class="btn button14">Wiper</button>
	<button class="btn button15">Hood</button>
	<button class="btn button16">Head Light</button>



</div>

				
			
<style type="text/css"> 

.container {
  position: relative;
}

	.button1 { 
	background-color: #555;
	font-size: 16px;
	cursor: pointer;
	position: absolute;
	text-align: center;
	color: white;
	padding: 5px 20px;
	top: 77%;
	left: 72%;
	}

	.button2 {
	background-color: #555;
	font-size: 16px;
	cursor: pointer;
	position: absolute;
	text-align: center;
	color: white;
	padding: 5px 26px;
	top: 69%;
	left: 80%;
	}
	
	.button3 {
	background-color: #555;
	font-size: 16px;
	cursor: pointer;
	position: absolute;
	text-align: center;
	color: white;
	padding: 5px 20px;
	top: 72%;
	left: 51%;
	}
	
	.button4 {
	background-color: #555;
	font-size: 16px;
	cursor: pointer;
	position: absolute;
	text-align: center;
	color: white;
	padding: 5px 20px;
	top: 77%;
	left: 43%;
	}
	
	.button5 {
	background-color: #555;
	font-size: 16px;
	cursor: pointer;
	position: absolute;
	text-align: center;
	color: white;
	padding: 5px 23px;
	top: 72%;
	left: 34%;
	}
	
	.button6 {
	background-color: #555;
	font-size: 16px;
	cursor: pointer;
	position: absolute;
	text-align: center;
	color: white;
	padding: 5px 20px;
	top: 78%;
	left: 23%;
	}
	
	.button7 {
	background-color: #555;
	font-size: 16px;
	cursor: pointer;
	position: absolute;
	text-align: center;
	color: white;
	padding: 5px 25px;
	top: 72%;
	left: 11%;
	}
	
	.button8 {
	background-color: #555;
	font-size: 16px;
	cursor: pointer;
	position: absolute;
	text-align: center;
	color: white;
	padding: 5px 18px;
	top: 52%;
	left: 4%;
	}
	
	.button9 {
	background-color: #555;
	font-size: 16px;
	cursor: pointer;
	position: absolute;
	text-align: center;
	color: white;
	padding: 5px 25px;
	top: 17%;
	left: 10%;
	}
	
	.button10 {
	background-color: #555;
	font-size: 16px;
	cursor: pointer;
	position: absolute;
	text-align: center;
	color: white;
	padding: 5px 20px;
	top: 10%;
	left: 24%;
	}
	
	.button11 {
	background-color: #555;
	font-size: 16px;
	cursor: pointer;
	position: absolute;
	text-align: center;
	color: white;
	padding: 5px 20px;
	top: 15%;
	left: 32%;
	}
	
	.button12 {
	background-color: #555;
	font-size: 16px;
	cursor: pointer;
	position: absolute;
	text-align: center;
	color: white;
	padding: 5px 20px;
	top: 12%;
	left: 46%;
	}
	
	.button13 {
	background-color: #555;
	font-size: 16px;
	cursor: pointer;
	position: absolute;
	text-align: center;
	color: white;
	padding: 5px 20px;
	top: 8%;
	left: 58%;
	}
	
	.button14 {
	background-color: #555;
	font-size: 16px;
	cursor: pointer;
	position: absolute;
	text-align: center;
	color: white;		
	padding: 5px 20px;
	top: 25%;
	left: 62%;
	}
	
	.button15 {
	background-color: #555;
	font-size: 16px;
	cursor: pointer;
	position: absolute;
	text-align: center;
	color: white;		
	padding: 5px 20px;
	top: 36%;
	left: 67%;
	}
	
	.button16 {
	background-color: #555;
	font-size: 16px;
	cursor: pointer;
	position: absolute;
	text-align: center;
	color: white;			
	padding: 5px 20px;
	top: 35%;
	left: 75%;
	}

</style>

</body>
</html>