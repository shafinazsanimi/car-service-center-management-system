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
<title>Customer</title>
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
	<button onclick="window.location.href='list.php'" class="btn btn-secondary btn-sm mb-3"><i class="fa fa-arrow-left"></i> Back To List</button>
</div>

    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						<h2>Customer Information</h2>
					</div>
					
                </div>
            </div>
            <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
              
					<?php
	include("connectionDB.php");
        if(isset($_GET['id'])){
			$output = '';  
            $id=$_GET['id'];
            $sql="SELECT * FROM customer WHERE cust_id = $id LIMIT 1";
			$result=mysqli_query($con,$sql);
			$output .= ' 
			<div class="table-responsive">  
			<table class="table table-bordered" id="customer_detail">';  
            while($row=mysqli_fetch_assoc($result)){
				$output .= '  
				<tr>  
				  	<th width="30%"><b><label>ID</label></th>  
				  	<td width="70%">'.$row["cust_id"].'</td>  
			 	</tr> 
                <tr>  
                     <th width=""><label>Name</label></th>  
                     <td width="70%">'.$row["cust_name"].'</td>  
                </tr>  
                <tr>  
                     <th width="30%"><label>IC Number</label></th>  
                     <td width="70%">'.$row["cust_ic"].'</td>  
                </tr>  
                <tr>  
                     <th width="30%"><label>Contact Number</label></th>  
                     <td width="70%">'.$row["cust_contact"].'</td>  
                </tr> 
				<tr class="noBorder">
					<td></td>
					<td>
						<button type="button" class="btn btn-success editdata" id="'.$row["cust_id"].'" data-toggle="modal" data-target="#updateData"><i class="fa fa-edit"></i> Edit</button>
						<button type="button" class="btn btn-danger deletedata" id="'.$row["cust_id"].'" data-toggle="modal" data-target="#deleteData"><i class="fa fa-trash"></i> Delete</button>
						<button type="button" class="btn btn-primary adddata" id="'.$row["cust_id"].'" data-toggle="modal" data-target="#addData"><i class="fa fa-plus"></i> Add Service</button>
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
        <h5 class="modal-title" id="updateLabel"><b>Edit Customer Information</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" id="upd_rec">
      	<div class="modal-body">
			<div class="form-group">
				<label><b>Name</b></label>
				<input type="text" class="form-control" name="name" id="name" placeholder="Enter customer name"/>
		  	</div>
			<div class="form-group">
				<label><b>IC Number</b></label>
				<input type="text" class="form-control" name="ic" id="ic" placeholder="Enter customer IC number"/>
		  	</div>
			<div class="form-group">
				<label><b>Contact Number</b></label>
				<input type="text" class="form-control" name="contactno" id="contactno" placeholder="01XXXXXXXX"/>
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

<!-- Delete Design Modal -->
	
<div class="modal fade" id="deleteData" tabindex="-1" role="dialog" aria-labelledby="deleteLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteLabel"><b>Are you sure want to delete this customer?</b></h5>
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

<!-- Add Service -->

<div class="modal fade" id="addData" tabindex="-1" role="dialog" aria-labelledby="addLabel" aria-hidden="true">
  		<div class="modal-dialog modal-dialog-centered" role="document">
    		<div class="modal-content">
      			<div class="modal-header">
        			<h5 class="modal-title" id="addLabel"><b>Add New Service</b></h5>
        			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          				<span aria-hidden="true">&times;</span>
        			</button>
      			</div>
      			<form method="POST" id="add_rec">
	      			<div class="modal-body">
			  			<div class="form-group">
							<label for="type"><b>Type</b></label>
							<select class="custom-select" name="type" id="type">
								<option value="" selected>Choose one</option>
								<option value="Purchase">Purchase</option>
								<option value="Installation">Installation</option>
								<option value="Purchase & Installation">Purchase & Installation</option>
							</select>
			  			</div>
						<div class="form-group">
							<label for="sp_name"><b>Spare Part Name</b></label>
							<?php 
							include 'connectionDB.php';
							$query="SELECT sp_desc FROM sparepart";
							$result=mysqli_query($con,$query);
							?>
							<select class="custom-select" name="sp_name" id="sp_name">
							<?php
							if($result){ 
								while($row=mysqli_fetch_array($result))
								{
									$sp_name = $row['sp_desc'];
									echo "<option value='$sp_name'>$sp_name</option>";
								}
							}
							?>
							</select>
			  			</div>
						<div class="form-group">
							<label for="sp_used"><b>Quantity of Spare Part</b></label>
							<input type="text" name="sp_used" class="form-control" id="sp_used" placeholder="0">
			  			</div>
						<div class="form-group">
							<label for="vehicle"><b>Vehicle</b></label>
							<input type="text" name="vehicle" class="form-control" id="vehicle" placeholder="Enter vehicle name">
			  			</div>
			  			<div class="form-group">
							<label for="description"><b>Description</b></label>
							<input type="text" name="description" class="form-control" id="description" placeholder="Enter service description">
			  			</div>
						<div class="form-group">
							<label for="fee"><b>Installation Fee (RM)</b></label>
							<input type="text" name="fee" class="form-control" id="fee" placeholder="00.00">
			  			</div>
						<div class="form-group">
							<input type="hidden" name="add_id" id="add_id"/>
						</div>
	      			</div>
	      			<div class="modal-footer justify-content-center">
	        			<button type="submit" class="btn btn-primary" id="addrec"><i class="fa fa-plus"></i> Add</button>
	        			<button type="button" class="btn btn-secondary" id="close_click" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
	      			</div>
      			</form>
    		</div>
  		</div>
	</div>

	<!-- End Add Service -->

<script>

$(document).ready(function(){

	$(document).on('click','.editdata',function(){  
		var id = $(this).attr("id"); 
    	$.ajax({  
            url:"update-customer.php",  
            method:"POST",  
            data:{id:id},  
	    	dataType:"json",  
            success:function(data){
                $('#name').val(data.cust_name);  
                $('#ic').val(data.cust_ic);  
                $('#contactno').val(data.cust_contact);  
                $('#update_id').val(data.cust_id);  
                $('#updateData').modal('show');  
            }  
        });  
    });  

	//Update Record

	$('#updaterec').click(function(e){
		e.preventDefault();
        var id=$('#update_id').val();
		var name=$('#name').val();
		var ic=$('#ic').val();
		var contactno=$('#contactno').val();
		if(name == ''){
			alert("Please enter customer name");  
            return false;  
       	}
		if(ic == ''){
			alert("Please enter customer IC number");  
            return false; 
		}
		if(contactno == ''){
			alert("Please enter customer contact number");  
            return false; 
		}
		$.ajax({
			url:"update-customer2.php",
			type:'POST',
			data:{name:name,ic:ic,contactno:contactno,id:id},
			success:function(data){
				alert("Customer information has been successfully updated!"); 
				$('#table-data').load('action.php');
				$('#upd_rec').trigger('reset'); 
				$('#up_cancel').trigger('click');
				location.reload();
			}
		});
	});

	//Delete record

	var deleteid;
	
	$(document).on('click','.deletedata',function(){ 
		deleteid = $(this).attr("id");
	});

	$('#deleterec').click(function(){
		$.ajax({
			url:'delete-customer.php',
			type:'POST',
			data:{delete_id:deleteid},
			success:function(data){
				alert("Customer has been successfully deleted!"); 
				$('#de_cancel').trigger("click");
            	window.location = "/fyp/supervisor/customer/list.php";
			}
		});
	});

	//Add Service

	$(document).on('click','.adddata',function(){ 
		var id = $(this).attr("id");
		$.ajax({  
            url:"add-service.php",  
            method:"POST",  
            data:{id:id},  
	    	dataType:"json",  
            success:function(data){
                $('#add_id').val(data.cust_id); 
            }  
        });  
	});

	$('#addrec').click(function(e){
		e.preventDefault();
		var type=$('#type').val();
		var description=$('#description').val();
		var sp_name=$('#sp_name').val();
		var sp_used=$('#sp_used').val();
		var vehicle=$('#vehicle').val();
		var fee=$('#fee').val();
        var cust_id=$('#add_id').val();
		if(type == ''){
			alert("Please choose service type");  
            return false;  
       	}
		if(sp_name == ''){
			alert("Please choose spare part name");  
            return false; 
		}
		if(sp_used == ''){
			alert("Please enter the quantity of spare part");  
            return false; 
		}
		if(vehicle == ''){
			alert("Please enter vehicle name");  
            return false; 
		}
		if(description == ''){
			alert("Please enter service description");  
            return false; 
		}
		if(fee == ''){
			alert("Please enter service installation fee");  
            return false; 
		}
		$.ajax({
			url:"add-service2.php",
			type:"POST",
			data:{type:type,description:description,sp_name:sp_name,sp_used:sp_used,vehicle:vehicle,fee:fee,cust_id:cust_id},
			success:function(data){
				alert("Service has been successfully added!");
				$('#add_rec').trigger('reset');
				$('#close_click').trigger('click');
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
		background: #0E6655;
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

</body>
</html>