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
<title>Spare Part</title>
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
	<button onclick="window.location.href='SparePartList8.php'" class="btn btn-secondary btn-sm mb-3"><i class="fa fa-arrow-left"></i> Back To List</button>
</div>

    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						<h2>Spare Part Information</h2>
					</div>
                </div>
            </div>
			
			
					
	<?php
	include("connectionDB.php");
        if(isset($_GET['id'])){
			$output = '';  
            $id=$_GET['id'];
            $sql="SELECT * FROM sparepart WHERE sp_id = $id LIMIT 1";
			$result=mysqli_query($con,$sql);
			$output .= ' 
			<div class="table-responsive">  
			<table class="table table-bordered" id="sparepart_detail">';  
			
            while($row=mysqli_fetch_assoc($result)){
				$output .= '  
				<tr class="noBorder"> 
					<td></td>
					<td>
					<img src="'.$row["sp_image"].'"/>
					</td>
			 	</tr> 
				<tr>  
				  	<th width="30%"><label>ID</label></th>  
				  	<td width="70%">'.$row["sp_id"].'</td>  
			 	</tr> 
                <tr>  
                     <th width=""><label>Type</label></th>  
                     <td width="70%">'.$row["sp_type"].'</td>  
                </tr>  
                <tr>  
                     <th width="30%"><label>Brand</label></th>  
                     <td width="70%">'.$row["sp_brand"].'</td>  
                </tr>  
                <tr>  
                     <th width="30%"><label>Description</label></th>  
                     <td width="70%">'.$row["sp_desc"].'</td>  
                </tr>  
                <tr>  
                     <th width="30%"><label>Price</label></th>  
                     <td width="70%">'.$row["sp_price"].'</td>  
                </tr>
                <tr>  
                     <th width="30%"><label>Stock Quantity</label></th>  
                     <td width="70%">'.$row["sp_stock"].'</td>  
                </tr>
                <tr>  
                     <th width="30%"><label>Date</label></th>  
                     <td width="70%">'.$row["sp_date"].'</td>  
                </tr>
				<tr class="noBorder">
				<td></td>
				<td>
					<button type="button" class="btn btn-success editdata" id="'.$row["sp_id"].'" data-toggle="modal" data-target="#updateData"><i class="fa fa-edit"></i> Edit</button>
					<button type="button" class="btn btn-danger deletedata" id="'.$row["sp_id"].'" data-toggle="modal" data-target="#deleteData"><i class="fa fa-trash"></i> Delete</button>
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
	</div>






<!-- Update Design Modal -->
	
<div class="modal fade" id="updateData" tabindex="-1" role="dialog" aria-labelledby="updateLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="updateLabel"><b>Edit Spare Part Information</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<form method="POST" id="upd_rec">
			<div class="form-group">
				<label><b>Type</b></label>
				<input type="text" class="form-control" name="type" id="type" placeholder="Enter spare part type"/>
		  	</div>
			<div class="form-group">
				<label><b>Brand</b></label>
				<input type="text" class="form-control" name="brand" id="brand" placeholder="Enter spare part brand"/>
		  	</div>
			<div class="form-group">
				<label><b>Description</b></label>
				<input type="text" class="form-control" name="description" id="description" placeholder="Enter spare part description"/>
			</div>
			<div class="form-group">
				<label><b>Price</b></label>
				<input type="text" class="form-control" name="price" id="price" placeholder="00.00"/>
			</div>
			<div class="form-group">
				<label><b>Stock Quantity</b></label>
				<input type="text" class="form-control" name="stock" id="stock" placeholder="0"/>
			</div>
			<div class="form-group">
				<input type="hidden" name="update_id" id="update_id"/>
			</div>
		</form>
      </div>
      <div class="modal-footer justify-content-center">
        <button type="submit" class="btn btn-success" id="updaterec"><i class="fa fa-save"></i> Save</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="up_cancel"><i class="fa fa-times"></i> Cancel</button>
      </div>	
    </div>
  </div>
</div>	
	
<!-- End Update Design Modal -->

<!-- Delete Design Modal -->
	
<div class="modal fade" id="deleteData" tabindex="-1" role="dialog" aria-labelledby="deleteLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteLabel"><b>Are you sure want to delete this spare part?</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		  <p>Tthis record will be deleted permanently.</p>
      </div>
      <div class="modal-footer justify-content-center">
       <button type="button" class="btn btn-danger" id="deleterec"><i class="fa fa-trash"></i> Delete</button>
        <button type="button" class="btn btn-secondary" id="de_cancel" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
      </div>
    </div>
  </div>
</div>	
	
<!-- End Delete Design Modal -->

<script>

$(document).ready(function(){

	$(document).on('click', '.editdata', function(){  
		var id = $(this).attr("id"); 
    	$.ajax({  
            url:"update.php",  
            method:"POST",  
            data:{id:id},  
	    	dataType:"json",  
            success:function(data){  
                $('#type').val(data.sp_type);  
                $('#brand').val(data.sp_brand);  
                $('#description').val(data.sp_desc);  
                $('#price').val(data.sp_price); 
                $('#stock').val(data.sp_stock);
                $('#update_id').val(data.sp_id);  
                $('#updateData').modal('show');  
            }  
        });  
    });  

	//Update Record

	$('#updaterec').click(function(e){
		e.preventDefault();
        var id=$('#update_id').val();
		var type=$('#type').val();
		var brand=$('#brand').val();
		var description=$('#description').val();
		var price=$('#price').val();
		var stock=$('#stock').val();
		if(type == ''){
			alert("Please enter spare part type");  
            return false;  
       	}
		if(brand == ''){
			alert("Please enter spare part brand");  
            return false; 
		}
		if(description == ''){
			alert("Please enter spare part description");  
            return false; 
		}
		if(price == ''){
			alert("Please enter spare part price");  
            return false; 
		}
		if(stock == ''){
			alert("Please enter spare part stock");  
            return false; 
		}
		$.ajax({
			url:"update2.php",
			type:'POST',
			data:{type:type,brand:brand,description:description,price:price,stock:stock,id:id},
			success:function(data){
				alert("Spare part detail has been successfully updated!"); 
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
			url:'delete.php',
			type:'POST',
			data:{delete_id:deleteid},
			success:function(data){
				alert("This spare part has been successfully deleted!"); 
				$('#de_cancel').trigger("click");
            	window.location = "SparePartList8.php";
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