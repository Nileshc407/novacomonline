<?php
//$Compnay_id = 7;
$Compnay_id = $_REQUEST['Compnay_id'];
$servername = "localhost";
$username = "root";
// $password = "Mysql@1234$#$";
$password = "Mysql@1234$#$";
$mysql_database = "novacom_devp";
$conn = new mysqli($servername, $username, $password,$mysql_database);

 if ($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}  

//$sql= mysqli_connect( $servername, $username, $password, $mysql_database);

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
	<h2>EASY</h2>
		<table id="example" class="table table-striped table-bordered nowrap" style="width:100%">
        <thead>
            <tr>
				<th>Date</th>
                <th>Enrollement id</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <!--<th>Address</th>-->
				<th>Card id</th>
                <th>OTP</th>
                <th>Varifed</th> 
				<th>Mobile Varify</th>
            </tr>
        </thead>
        <tbody>
		<?php 
		
			
 
		$sqlquery="SELECT `A`.`Creation_date_time`, `B`.`Enrollement_id`, `B`.`Card_id`, `B`.`First_name`, `B`.`Last_name`, `B`.`Current_address`, `B`.`Phone_no`, `B`.`User_email_id`, `A`.`OPT_code`, `A`.`Varifed` FROM `igain_sent_otp` as `A` JOIN `igain_enrollment_master` AS `B` ON `A`.`Beneficiary_membership_id` = `B`.`Card_id` WHERE `A`.`Igain_company_id` = $Compnay_id"; 
		
		 $query = mysqli_query($conn,$sqlquery);
		  while($row = mysqli_fetch_object($query)){ 
		 
		  ?>
			 
		  
            <tr>
				<td><?php echo $row->Creation_date_time ; ?></td>
                <td><?php echo $row->Enrollement_id; ?></td>
                <td><?php echo $row->First_name.' '.$row->Last_name; ?></td>
                <td><?php echo App_string_decrypt($row->Phone_no); ?></td>
                <td><?php echo App_string_decrypt($row->User_email_id); ?></td>
                <!--<td><?php //echo App_string_decrypt($row->Current_address); ?></td>-->
				<td><?php echo $row->Card_id; ?></td>
                <td><?php echo $row->OPT_code; ?></td>
                <td><?php echo $row->Varifed; ?></td>
                <td><?php if($row->Varifed == 1){ echo "YES"; } else { echo "NO"; } ?></td>
            </tr>
			<?php 
			}
		
		?>
            
        </tbody>
    </table>
</div>

</body>
</html>
<br>
<br>
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

<br>
<br>
<br>
<br>
<br>

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





