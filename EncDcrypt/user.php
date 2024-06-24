<?php 
$servername = "localhost";
$username = "root";
$password = "Inf0rmation@123";
// $password = "";
$mysql_database = "ehpdemo_novacom";
$conn = new mysqli($servername, $username, $password,$mysql_database);

 if ($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}  

//$sql= mysqli_connect( $servername, $username, $password, $mysql_database);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>DEMO Novacom</title>
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
	<h2>Decrypt Data</h2>
		<table id="example" class="table table-striped table-bordered nowrap" style="width:100%">
        <thead>
            <tr>
                <th>$$</th>
                <th>FN</th>
                <th>LN</th>
                <th>PN</th>
                <th>EN</th>
                <th>UP</th>
                <th>CI</th>
                <th>UI</th>
                <th>CI</th>
                <th>CB</th>
            </tr>
        </thead>
        <tbody>
		<?php 
		
			
 
		$sqlquery="select * from `igain_enrollment_master`";
		 $query = mysqli_query($conn,$sqlquery);
		  while($row = mysqli_fetch_object($query)){ 
		 
		  ?>
			 
		  
            <tr>
                <td><?php echo $row->Enrollement_id; ?></td>
                <td><?php echo $row->First_name; ?></td>
                <td><?php echo $row->Last_name; ?></td>
                <td><?php echo App_string_decrypt($row->Phone_no); ?></td>
                <td><?php echo App_string_decrypt($row->User_email_id); ?></td>
                <td><?php echo App_string_decrypt($row->User_pwd); ?></td>
                <td><?php echo $row->Company_id; ?></td>
                <td><?php echo $row->User_id; ?></td>
                <td><?php echo $row->Card_id; ?></td>
                <td><?php echo $row->Current_balance; ?></td>
				
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







