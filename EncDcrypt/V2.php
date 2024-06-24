<?php 
$servername = "localhost";
$username = "root";
$password = "Mysql@1234$#$";
$mysql_database = "eclipseh_prod";
$conn = new mysqli($servername, $username, $password,$mysql_database);

 if ($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}  
$Company_id = 7;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>eclipsehlive</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.2.0/css/fixedHeader.bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css">
  </head>
<body>
<br>
<div class="container">
<?php
	$Membership_id = $_REQUEST['membership_id'];
	$From_date = $_REQUEST['from_date'];
	$Till_date = $_REQUEST['till_date'];
	if($From_date != Null && $Till_date != Null)
	{
		$From_date = date("Y-m-d 00:00:00",strtotime($From_date));
		$To_date = date("Y-m-d 23:59:59",strtotime($Till_date));
	}
	else
	{
		$From_date = "1970-01-01 00:00:00";
		$Till_date = date("Y-m-d 23:59:59");
		
		$From_date = date("Y-m-d 00:00:00",strtotime($From_date));
		$To_date = date("Y-m-d 23:59:59",strtotime($Till_date));
	}
?>
	<h4>Member Code Details</h4>
		<table id="example" class="table table-striped table-bordered nowrap" style="width:100%">
        <thead>
            <tr>
                <th>Id</th>
                <th>Card id</th>
                <th>Member name</th>
                <th>Phone no</th>
                <th>Code</th>
                <th>Type</th>
                <th>Creation date time</th>
                <th>Expiry date time</th>
                <th>Used</th>
            </tr>
        </thead>
        <tbody>
	<?php 
	if($Membership_id != Null) {
		$sqlquery = "SELECT A.`id`,A.`Card_id`,CONCAT(B.First_name, ' ' ,B.Last_name) AS Membere_name,B.`Phone_no`,A.`Pin`,A.`Pin_type`, A.`pinno_creation_date_time`,A.`pinno_expiry_date_time`,A.`pinno_used` FROM `igain_cust_earn_redeem_code_log` AS A JOIN igain_enrollment_master As B ON A.Card_id =B.Card_id  WHERE A.Company_id = $Company_id AND A.Card_id = $Membership_id AND A.pinno_creation_date_time BETWEEN '".$From_date."' AND '".$To_date."'";	
		}
		else
		{
			$sqlquery = "SELECT A.`id`,A.`Card_id`,CONCAT(B.First_name, ' ' ,B.Last_name) AS Membere_name,B.`Phone_no`,A.`Pin`,A.`Pin_type`, A.`pinno_creation_date_time`,A.`pinno_expiry_date_time`,A.`pinno_used` FROM `igain_cust_earn_redeem_code_log` AS A JOIN igain_enrollment_master As B ON A.Card_id =B.Card_id  WHERE A.Company_id = $Company_id AND A.pinno_creation_date_time BETWEEN '".$From_date."' AND '".$To_date."'";
		}
		
		$query = mysqli_query($conn,$sqlquery);
		  while($row = mysqli_fetch_object($query))
		  {	?>
				<tr>
                <td><?php echo $row->id; ?></td>
                <td><?php echo $row->Card_id; ?></td>
                <td><?php echo $row->Membere_name; ?></td>
				 <td><?php echo App_string_decrypt($row->Phone_no); ?></td>
                <td><?php echo $row->Pin; ?></td>
                <td><?php echo $row->Pin_type; ?></td>
                <td><?php echo $row->pinno_creation_date_time; ?></td>
                <td><?php echo $row->pinno_expiry_date_time; ?></td>
                <td><?php echo $row->pinno_used; ?></td>
            </tr>
		<?php   }  ?>  
        </tbody>
    </table>
</div>
</body>
</html>
<?php
error_reporting(0);
function App_string_decrypt($saved_bundle)
{
	$cipher = "aes-256-gcm";
	$message = 'opensesame';
	
	//echo "strlen--".strlen($msg_bundle);
	// Parse iv and encrypted string segments
	$components = explode( ':', $saved_bundle );

	//var_dump($components);

	$salt          = $components[0];
	$iv            = $components[1];
	$encrypted_msg = $components[2];

	$decrypted_msg = openssl_decrypt(
	  "$encrypted_msg", 'aes-256-cbc', "$salt:$message", null, $iv
	);

	if ( $decrypted_msg === false ) 
	{
	  // die("Unable to decrypt message! (check password) \n");
	  // echo "Unable to decrypt info.!";
	}
	else
	{
		$msg = substr( $decrypted_msg, 41 );
		return $decrypted_msg;
	}
}
?>

</body>
</html>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/fixedheader/3.2.0/js/dataTables.fixedHeader.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap.min.js"></script>  
<script>
	$(document).ready(function() {
    var table = $('#example').DataTable( {
        responsive: true
    } );
 
    new $.fn.dataTable.FixedHeader( table );
} );
</script>