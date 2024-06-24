<?php if(count($Trans_Records) != 0) { 

//error_reporting(0);

?>
<div class="panel panel-info" style="border-color: #bce8f1;">
	<div> 
		<h1 style="text-align:center"><?php echo $Company_name;?></h1>
		<h2 style="text-align:center">Member Stamp Report</h2>
		
		
	</div>
	<div>
		<h5 style="text-align:right">Todays Date : <?php echo date("d M Y"); ?></h5>
		</div>
	
	<div>
		<table border="1" cellpadding="10" cellspacing="0" style="border-collapse: collapse;">
		
			<thead>
						
						<tr>
							<th>Trans Date</th>
							<th>Membership Id</th>
							<th>Member Name</th>
							<th>Bill No.</th>
							<th>Purchase Amount<?php echo '('.$Symbol_of_currency.')';?></th>
							<th>Stamps Collected</th>	
							<th>Outlet</th>	
						</tr>
					
						</thead>
						
						<tbody>
						<?php
						
						if(count($Trans_Records) > 0)
						{ 
							foreach($Trans_Records as $row)
							{
								
								echo "<tr>";
								echo "<td>".date('Y-m-d',strtotime($row->Trans_date))."</td>";
								echo "<td>".$row->Card_id."</td>";
								echo "<td>".$row->Member_name."</td>";
								echo "<td>".$row->Bill_no."</td>";
								echo "<td>".number_format(round($row->Purchase_amt),2)."</td>";
								echo "<td>".$row->Stamp_collected."</td>";
								echo "<td>".$row->Outlet."</td>";
								echo "</tr>";	
							}
							
						}
						?>			
			</tbody> 
		</table>
		</table>
	</div>
</div>
<?php } ?>