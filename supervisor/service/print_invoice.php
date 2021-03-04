<?php

include_once('connectionDB.php');
include_once('pdf.php'); 
if(isset($_GET["id"]) && isset($_GET["pdf"]))  
{  
	$test = $_GET['id'];
    $query = "SELECT * FROM service
			  INNER JOIN customer ON service.cust_id=customer.cust_id
			  INNER JOIN sparepart ON service.sp_name=sparepart.sp_desc
			  WHERE svc_id = $test";
			  
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);

	$output = '';
	$output .= '<h2><center>Car Service Center Management System</center></h2>
				<h3><center>INVOICE</h3>
				<table width="100%" border="1" cellpadding="5" cellspacing="0">
				<tr>
					<td colspan="2">
					<table width="100%" cellpadding="5">
				<tr>
					<td width="65%">
					To,<br />
					<b>RECEIVER (BILL TO)</b><br />
					Name : '.$row['cust_name'].'<br /> 
					Contact Number : '.$row['cust_contact'].'<br />
					Vehicle : '.$row['vhc_name'].'<br />
					</td>
					<td width="35%">         
					Invoice No. : '.$row['svc_id'].'<br />
					Invoice Date : '.$row['svc_date'].'<br />
					Status : '.$row['svc_paymentstatus'].'<br />
					</td>
				</tr>
					</table>
					<br />
					<table width="100%" border="1" cellpadding="5" cellspacing="0">
				<tr>
					<th align="left">Description</th>
					<th align="left">Spare Part Name</th>
					<th align="left">Spare Part Price (RM)</th>
					<th align="left">Quantity Used</th>
					<th align="left">Installation Fee (RM)</th>
					<th align="left">Total Fee (RM)</th> 
				</tr>
				<tr>
					<td align="left">'.$row["svc_desc"].'</td>
					<td align="left">'.$row["sp_name"].'</td>
					<td align="left">'.$row["sp_price"].'</td>
					<td align="left">'.$row["sp_used"].'</td>
					<td align="left">'.$row["svc_installfees"].'</td>  
					<td align="left">'.$row["svc_totalfees"].'</td>   
				</tr>';
		$output .= '
					</table>
					</td>
				</tr>
				</table>';
}

$dompdf = new Test();
$invoiceFileName = 'Invoice-'.$test.'.pdf';
$dompdf->loadHtml(html_entity_decode($output));
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();
$dompdf->stream($invoiceFileName, array("Attachment" => false));

?>