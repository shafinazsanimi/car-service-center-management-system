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
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>User Log</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<meta http=equiv="Content-Type" content="text/html; charset=utc-8">


</head>
<body>

	<nav class="navbar navbar-inverse navbar-fixed-top">
	  <div class="container-fluid">
		<h4 class="navbar-text">CSCMS</h4>
		<ul class="nav navbar-nav">
		  <li class="active"><a href="../dashboard/index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
		</ul>
	  </div>
	</nav>
	
    <div class="container" style="margin-top:50px">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						<h2>User Log</h2>
					</div>
					<div class="col-sm-6">
						<input type="text" name="search" id="search_text" class="form-control form-control-md border-secondary" style="width:400px" placeholder="Search ID / Type / Description / Customer Name">
					</div>
					
                </div>
            </div>
            <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
            <?php
					include 'connectionDB.php';
					$stmnt=$con->prepare("SELECT * FROM activitylog");
					$stmnt->execute();
					$result=$stmnt->get_result();
				?>
			<table class="table table-bordered" id="table-data">
                <thead>
                    <tr>
						<th>ID
						<th>Username
						<th>Grant Level
						<th>Date & Time 
						<th>Activity
                    </tr>
                </thead>
				<tbody>
						<?php while($row=$result->fetch_assoc())
						{ ?>
						<tr>
							<td><?= $row['log_id']; ?></td>
							<td><?= $row['username']; ?></td>
							<td><?= $row['grant_level']; ?></td>
							<td><?= $row['log_datetime']; ?></td>
							<td><?= $row['log_activity']; ?></td>
						</tr>
						<?php } ?>
					</tbody>
            </table>
			
        </div>
    </div>     
</body>
</html>  

<script type="text/javascript">

$(document).ready(function(){
	$('[data-toggle="tooltip"]').tooltip();
	
});

$(document).ready(function(){

			$("#search_text").keyup(function(){
				var search=$(this).val();
				$.ajax({
					url:'action.php',
					method:'POST',
					data:{query:search},
					success:function(response){
						$("#table-data").html(response);
					}
				});
			});
			
		});
</script>   

<style type="text/css">
body {
        color: #566787;
		background: #f5f5f5;
		font-family: 'Varela Round', sans-serif;
		font-size: 13px;
	}
	.table-wrapper {
        background: #fff;
        padding: 20px 25px;
        margin: 30px 0;
		border-radius: 3px;
        box-shadow: 0 1px 1px rgba(0,0,0,.05);
    }
	.table-title {        
		padding-bottom: 15px;
		background: #0E6251;
		color: #fff;
		padding: 16px 30px;
		margin: -20px -25px 10px;
		border-radius: 3px 3px 0 0;
    }
    .table-title h2 {
		margin: 5px 0 0;
		font-size: 24px;
	}
	.table-title .btn-group {
		float: right;
	}
	.table-title .btn {
		color: #fff;
		float: right;
		font-size: 13px;
		border: none;
		min-width: 50px;
		border-radius: 2px;
		border: none;
		outline: none !important;
		margin-left: 10px;
	}
	.table-title .btn i {
		float: left;
		font-size: 21px;
		margin-right: 5px;
	}
	.table-title .btn span {
		float: left;
		margin-top: 2px;
	}
    table.table tr th, table.table tr td {
        border-color: #e9e9e9;
		padding: 12px 15px;
		vertical-align: middle;
    }
	table.table tr th:first-child {
		width: 60px;
	}
	table.table tr th:last-child {
		width: 100px;
	}
    table.table-striped tbody tr:nth-of-type(odd) {
    	background-color: #fcfcfc;
	}
	table.table-striped.table-hover tbody tr:hover {
		background: #f5f5f5;
	}
    table.table th i {
        font-size: 13px;
        margin: 0 5px;
        cursor: pointer;
    }	
    table.table td:last-child i {
		opacity: 0.9;
		font-size: 22px;
        margin: 0 5px;
    }
	table.table td a {
		font-weight: bold;
		color: #566787;
		display: inline-block;
		text-decoration: none;
		outline: none !important;
	}
	table.table td a:hover {
		color: #2196F3;
	}
	table.table td a.edit {
        color: #FFC107;
    }
    table.table td a.delete {
        color: #F44336;
    }
    table.table td i {
        font-size: 19px;
    }
	table.table .avatar {
		border-radius: 50%;
		vertical-align: middle;
		margin-right: 10px;
	}
 
	/* Modal styles */
	.modal .modal-dialog {
		max-width: 400px;
	}
	.modal .modal-header, .modal .modal-body, .modal .modal-footer {
		padding: 20px 30px;
	}
	.modal .modal-content {
		border-radius: 3px;
	}
	.modal .modal-footer {
		background: #ecf0f1;
		border-radius: 0 0 3px 3px;
	}
    .modal .modal-title {
        display: inline-block;
    }
	.modal .form-control {
		border-radius: 2px;
		box-shadow: none;
		border-color: #dddddd;
	}
	.modal textarea.form-control {
		resize: vertical;
	}
	.modal .btn {
		border-radius: 2px;
		min-width: 100px;
	}	
	.modal form label {
		font-weight: normal;
	}

[data-href] {
    cursor:pointer;
	}	
</style>                       