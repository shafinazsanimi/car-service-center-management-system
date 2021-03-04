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
<meta charset="UTF-8">
<meta http-equiv="X-UA_Compatible" content="IE-edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Staff</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>

<div class="card-body">
	<button onclick="window.location.href='../dashboard/index.php'" class="btn btn-secondary btn-sm mb-3"><i class="fa fa-arrow-left"></i> Back To Main</button>
</div>

    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						<h2>Staff Profile</h2>
					</div>
                </div>
            </div>
            <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
            <?php
			include("connectionDB.php");
        	if(isset($_GET['id'])){
			$output = '';  
            $id=$_GET['id'];
            $sql="SELECT * FROM staff WHERE st_id = $id LIMIT 1";
			$result=mysqli_query($con,$sql);
			$output .= ' 
			<div class="table-responsive">  
			<table class="table table-bordered">';  
            while($row=mysqli_fetch_assoc($result)){
				$output .= '  
				<tr>  
				  	<th width="30%"><label>ID</label></th>  
				  	<td width="70%">'.$row["st_id"].'</td>  
				 </tr> 
				 <tr>  
                     <td width=""><b><label>Username</label></b></td>  
                     <td width="70%">'.$row["st_username"].'</td>  
                </tr>   
                <tr>  
                     <td width="30%"><b><label>Salt Password</label></b></td>  
                     <td width="70%">'.$row["st_salt"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><b><label>Hashed Password</label></b></td>  
                     <td width="70%">'.$row["st_password"].'</td>  
                </tr> 
                <tr>  
                     <th width=""><label>Full Name</label></th>  
                     <td width="70%">'.$row["st_fullname"].'</td>  
                </tr> 
                <tr>  
                     <th width="30%"><label>Contact Number</label></th>  
                     <td width="70%">'.$row["st_contact"].'</td>  
                </tr> 
                <tr>  
                     <th width="30%"><label>Gender</label></th>  
                     <td width="70%">'.$row["st_gender"].'</td>  
                </tr>
                <tr>  
                     <th width="30%"><label>Grant Level</label></th>  
                     <td width="70%">'.$row["grant_level"].'</td>  
                </tr>
				<tr class="noBorder">
					<td></td>
					<td>
						<button type="button" class="btn btn-success editdata" id="'.$row["st_id"].'" 
						data-toggle="modal" data-target="#updateData"><i class="fa fa-edit"></i> Edit</button>
					</td>
				</tr>
           		';  
			  }  
			$output .= '  
           	</table>  
     		</div>  
      		';  
			echo $output;
		}
			?>
    </div>  

<!-- Update Design Modal -->
	
<div class="modal fade" id="updateData" tabindex="-1" role="dialog" aria-labelledby="updateLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="updateLabel">Edit Staff Profile</h5>
			</button>
		</div>
		<form method="POST" id="upd_rec">
			<div class="modal-body">
				<div class="form-group">
					<label><b>Full Name</b></label>
					<input type="text" class="form-control" name="fullname" id="fullname" placeholder="Enter your full name"/>
				</div>
				<div class="form-group">
					<label><b>Contact Number</b></label>
					<input type="text" class="form-control" name="contactno" id="contactno" placeholder="01X XXXXXXX"/>
				</div>
				<div class="form-group">
					<label><b>Gender</b></label>
					<select class="custom-select" name="gender" id="gender">
						<option value="" selected>Choose one</option>
						<option value="Male">Male</option>
						<option value="Female">Female</option>
					</select>
				</div>
				<div class="form-group">
					<input type="hidden" name="update_id" id="update_id"/>
				</div>
			</div>
			<div class="modal-footer justify-content-center">
				<button type="submit" class="btn btn-success" id="updaterec"><i class="fa fa-save"></i> Save</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal" id="up_cancel"><i class="fa fa-times"></i> Cancel</button>
			</div>	
		</form>
		</div>
	</div>
	</div>	
	
	<!-- End Update Design Modal -->

</body>
</html> 

<script type="text/javascript">

$(document).ready(function(){

	$(document).on('click','.editdata',function(){  
		var id = $(this).attr("id"); 
		$.ajax({  
			url:"update.php",  
			method:"POST",  
			data:{id:id},  
			dataType:"json",  
			success:function(data){
				$('#fullname').val(data.st_fullname);  
				$('#contactno').val(data.st_contact);  
				$('#gender').val(data.st_gender);  
				$('#update_id').val(data.st_id);  
				$('#updateData').modal('show');  
			}  
		});  
	});  

	//Update Record

	$('#updaterec').click(function(e){
		e.preventDefault();
		var id=$('#update_id').val();
		var fullname=$('#fullname').val();
		var contactno=$('#contactno').val();
		var gender=$('#gender').val();
		if(fullname == ''){
			alert("Please enter your full name");  
			return false;  
		}
		if(contactno == ''){
			alert("Please enter your contact number");  
			return false; 
		}
		if(gender == ''){
			alert("Please choose your gender");  
			return false; 
		}
		$.ajax({
			url:"update2.php",
			type:'POST',
			data:{fullname:fullname,contactno:contactno,gender:gender,id:id},
			success:function(data){
				alert("Your profile has been successfully updated!"); 
				$('#upd_rec').trigger('reset'); 
				$('#up_cancel').trigger('click');
				location.reload();
			}
		});
	});

});

</script>

<style type="text/css">

[data-href] {
    cursor:pointer;
	}
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
		background: #7B0404;
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
   tr.noBorder td {
  border: 0;
} 

</style>          