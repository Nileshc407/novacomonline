<div class="panel panel-info" style="border-color: #bce8f1;">
	<div>
		<h1 style="text-align:center"><?php echo $Company_name;?></h1>
		<h2 style="text-align:center">
			<?php if($report_type==1){ echo 'Unclaimed Bill Report Details'; }
							else{echo 'Unclaimed Bill Report Summary'; }
					?>
		</h2>
		<h4 style="text-align:center"><?php echo "From Date: ".date("Y-m-d",strtotime($start_date))." To Date: ".date("Y-m-d",strtotime($end_date)); ?></h4>
	</div>                 
  <div class="table-responsive">
	<table border="1" cellpadding="10" cellspacing="0" style="border-collapse: collapse;">
		<thead>

			<?php if($report_type==1){ //Details?>
								<tr>
									
								<!--	<th>Sequence No</th>-->
									<th>Transaction Date</th>
									<th>Transaction Type</th>
									<th>POS Bill No.</th>
									
									<th>Outlet</th>
									<th>Item Name</th>
									<th>Quantity</th>
									<th>Item Rate <?php echo '('.$Symbol_of_currency.')';?></th>
									<th>Purchase Amt <?php echo '('.$Symbol_of_currency.')';?></th>
								
							

								</tr>
								<?php }
								if($report_type==2){ //summary?>
								<tr>

								
									<th>Transaction Date</th>
									<th>Transaction Type</th>
									<th>POS Bill No.</th>
									
									<th>Outlet</th>
									
									<th>Total Bill Amt <?php echo '('.$Symbol_of_currency.')';?></th>
									<th>Total Discount <?php echo '('.$Symbol_of_currency.')';?></th>
									</th>

								</tr>
								<?php } ?>
		</thead>
		<tbody>
	<?php
						if(count($Trans_Records) > 0)
						{
							
							foreach($Trans_Records as $row)
							{
								
								if($report_type==1)//Details
								{
									
									echo "<tr>";
									echo "<td>".$row->Trans_date."</td>";
									echo "<td>".$row->Trans_NAME."</td>";
									echo "<td>".$row->Bill_no."</td>";
									echo "<td>".$row->Outlet_name."</td>";
									echo "<td>".$row->Item_name."</td>";
									echo "<td>".$row->Quantity."</td>";
									echo "<td>".number_format(round($row->Item_rate),2)."</td>";
									echo "<td>".number_format(round($row->Purchase_amount),2)."</td>";
									
									echo "</tr>";
								}
								else
								{ 
									echo "<tr>";
									echo "<td>".$row->Trans_date."</td>";
									echo "<td>".$row->Trans_NAME."</td>";
									echo "<td>".$row->Bill_no."</td>";
									echo "<td>".$row->Outlet_name."</td>";
									echo "<td>".number_format(round($row->Bill_total),2)."</td>";
									echo "<td>".number_format(round($row->Pos_discount),2)."</td>";
									echo "</tr>";
								}
								
							}
						}
						?>
		</tbody>
	</table>
	
  </div>
</div>
