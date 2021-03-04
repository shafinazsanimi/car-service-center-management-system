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
<title>Live Search</title>
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
	<button onclick="window.location.href='StList.php'" class="btn btn-secondary btn-sm mb-3"><i class="fa fa-arrow-left"></i> Back To List</button>
</div>

    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						<h2>Staff Information</h2>
					</div>
					
                </div>
            </div>
            <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
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
                     <th width=""><label>Name</label></th>  
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
						<button type="button" class="btn btn-danger deletedata" id="'.$row["st_id"].'" data-toggle="modal" data-target="#deleteData"><i class="fa fa-trash"></i> Delete</button>
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

	

<!-- Delete Design Modal -->
	
<div class="modal fade" id="deleteData" tabindex="-1" role="dialog" aria-labelledby="deleteLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteLabel"><b>Are you sure want to delete this staff?</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		  <p>This record will be deleted permanently.</p>
      </div>
      <div class="modal-footer justify-content-center">
        <button type="button" class="btn btn-danger" id="deleterec"><i class="fa fa-trash"></i> Delete</button>
        <button type="button" class="btn btn-secondary" id="de_cancel" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
      </div>
    </div>
  </div>
</div>	
	
<!-- End Delete Design Modal -->


 
  

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

<script>

$(document).ready(function(){
	
	//Delete record

	var deleteid;
	
	$(document).on('click','.deletedata',function(){ 
		deleteid = $(this).attr("id");
	});

	$('#deleterec').click(function(){
		$.ajax({
			url:'delete.php',
			type:'POST',
			data:{delete_id:deleteid},
			success:function(data){
				alert("Staff has been successfully deleted!"); 
				$('#de_cancel').trigger("click");
            	window.location = "/fyp/supervisor/staff/StList.php";
			}
		});
	});

});

</script>

</body>
</html> 
                     