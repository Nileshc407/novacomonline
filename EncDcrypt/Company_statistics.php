<?php 
$servername = "localhost";
$username = "root";
$password = "Mysql@1234$#$";
$mysql_database = "eclipseh_prod";
$conn = new mysqli($servername, $username, $password,$mysql_database);

 if ($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}  
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
	$From_date = $_REQUEST['from_date'];
	$Till_date = $_REQUEST['till_date'];
	if($From_date != Null && $Till_date != Null)
	{
		$From_date = date("Y-m-d",strtotime($From_date));
		$To_date = date("Y-m-d",strtotime($Till_date));
	}
	else
	{
		$From_date = "1970-01-01";
		$Till_date = date("Y-m-d");
		
		$From_date = date("Y-m-d",strtotime($From_date));
		$To_date = date("Y-m-d",strtotime($Till_date));
	}
?>
	<h4>Company Statistics</h4>
		<table id="example" class="table table-striped table-bordered nowrap" style="width:100%">
        <thead>
            <tr>
                <th>Company id</th>
                <th>Company name</th>
                <th>Total enrollment</th>
                <th>Total pos transaction <?php echo "From : ".$From_date." To : ".$To_date; ?></th>
            </tr>
        </thead>
        <tbody>
	<?php 
		$sqlquery = "SELECT `A`.`Company_id`, `A`.`Company_name`, count(`B`.`Enrollement_id`) as Total_enroll_count FROM `igain_company_master` as `A`  JOIN `igain_enrollment_master` AS `B` ON `A`.`Company_id` = `B`.`Company_id`  WHERE `B`.`User_id` = 1 group by `A`.`Company_id`";
		 $query = mysqli_query($conn,$sqlquery);
		  while($row = mysqli_fetch_object($query))
		  {	?>
				<tr>
                <td><?php echo $row->Company_id; ?></td>
                <td><?php echo $row->Company_name; ?></td>
                <td><?php echo $row->Total_enroll_count; ?></td>
		<?php
			$transquery="select count(DISTINCT (`Bill_no`)) as Total_trans_count from `igain_transaction` WHERE Company_id = $row->Company_id AND Trans_type = 2 AND Trans_date BETWEEN '".$From_date."' AND '".$To_date."'";
			$querytrans = mysqli_query($conn,$transquery);
			while($row1 = mysqli_fetch_object($querytrans)){ 
		  ?>
                <td><?php echo $row1->Total_trans_count; ?></td>
            </tr>
		<?php   } } ?>  
        </tbody>
    </table>
</div>
</body>
</html>
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