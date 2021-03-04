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
<title>Spare Part</title>
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
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


</head>
<body>

	<nav class="navbar navbar-inverse navbar-fixed-top">
	  <div class="container-fluid">
		<h4 class="navbar-text">CSCMS</h4>
		<ul class="nav navbar-nav">
		  <li class="active"><a href="../dashboard/index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
		</ul>
		 <ul class="nav navbar-nav">
		  <li><a href="carpart.php"><span class="glyphicon glyphicon-wrench"></span> Car Part</a></li>
		</ul>
	  </div>
	</nav>
	
    <div class="container" style="margin-top:50px">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						<h2>Spare Part</h2>
					</div>
                </div>
            </div>
            <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
            <?php
					include 'connectionDB.php';
					$stmnt=$con->prepare("SELECT * FROM sparepart WHERE sp_stock<'3'");
					$stmnt->execute();
					$result=$stmnt->get_result();
				?>
			<table class="table table-bordered" id="table-data">
                <thead>
                    <tr>
                        
						<th>ID
						<th>Type
						<th>Brand
						<th>Description
						<th>Stock
						
                    </tr>
                </thead>
				<tbody>
						<?php while($row=$result->fetch_assoc())
						{ ?>
						<tr class='clickable-row text-primary' data-href='/fyp/staff/sparepart/SparePartDisplay.php?id=<?php echo $row['sp_id']; ?>'>
							<td><u><?= $row['sp_id']; ?></u></td>
							<td><u><?= $row['sp_type']; ?></u></td>
							<td><u><?= $row['sp_brand']; ?></u></td>
							<td><u><?= $row['sp_desc']; ?></u></td>
							<td><u><?= $row['sp_stock']; ?></u></td>
						</tr>
						<?php } ?>
					</tbody>
            </table>
			
        </div>
    </div>  

<script type="text/javascript">

		jQuery(document).ready(function($){
    		$(".clickable-row").click(function(){
        		window.location = $(this).data("href");
    		});
		});

</script>	

<style type="text/css">

body {
        color: #566787;
		background: #f5f5f5;
		font-family: 'Varela Round', sans-serif;
		font-size: 15px;
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
		background: #483D8B;
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

</body>
</html>  
