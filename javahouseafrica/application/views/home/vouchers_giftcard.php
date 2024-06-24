<?php $this->load->view('header/header');
$Current_point_balance = ($Enroll_details->Total_balance-$Enroll_details->Debit_points);		
if($Current_point_balance<0)
{
	$Current_point_balance=0;
}
else
{ 
	$Current_point_balance=$Current_point_balance;
}		
?> 
<section class="content-header">
<h1>Vouchers</h1>	 
</section>
<ul class="nav nav-tabs" id="myTab" role="tablist">
	<li class="nav-item" role="presentation">
		<a href="<?php echo base_url()?>index.php/Cust_home/Vouchers_giftcard">Vouchers</a>
	</li>
	<li class="nav-item" role="presentation">
		<a href="<?php echo base_url()?>index.php/Cust_home/Giftcard">Gift Cards</a>
	</li>
</ul>
<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12" id="customer-orders">
			<div class="box">
				<div class="table-responsive">
					<table class="table table-hover">
						<thead>
							<tr>
								<th>Voucher Type</th>
								<th>Voucher No.</th>
								<th>% / Value</th>
								<th>Issued On</th>
								<th>Valid Till</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							if($MyDiscountVouchers !="")
							{
								foreach($MyDiscountVouchers as $row)
								{ ?>
									<tr>
										<td><?php 
												if($row->Payment_Type_id == 99){ echo "Discount Voucher";}
												if($row->Payment_Type_id == 998){ echo "Revenue Voucher";} 
												if($row->Payment_Type_id == 997){ echo "Product Voucher";} 
										?></td>
										<td><?php echo $row->Gift_card_id; ?></td>
										<td><?php 
											// if($row->Card_value > 0){ echo $Currency_Symbol.' '.number_format($row->Card_value,2); }
											
											if($row->Discount_percentage > 0)
											{ 
												echo $row->Discount_percentage.'%'; 
											} else {
												echo $Currency_Symbol.' '.number_format($row->Card_value,2);
											}
										
										?></td>
										<td><?php echo "<b>".date('d-M-Y',strtotime($row->Create_date))."</b>"; ?></td>	
										<td><?php echo "<b>".date('d-M-Y',strtotime($row->Valid_till))."</b>"; ?></td>	
										<td><?php if($row->Card_balance > 0){ echo "<b style='color:green;'>Issued</b>"; } else { echo "<b style='color:red;'>Used</b>"; } ?></td>
									</tr>
								<?php
								}
							}
							else
							{?>
							<tr><td colspan="6" class="text-center"><?php echo ('No Records Found'); ?></td></tr>	
							<?php
							}
							?>
							
						</tbody>
					</table>
				</div>
				<!-- /.table-responsive -->
				<div class="panel-footer"><?php echo $pagination; ?></div>
			</div>
			<!-- /.box -->
		</div>
	</div>
<!-- Modal -->
<div id="item_info_modal" class="modal fade" role="dialog" style="overflow:auto;">
	<div class="modal-dialog" style="width: 70%;" id="Show_item_info">
		<div class="modal-content" >
			<div class="modal-header">
				<div class="modal-body">
					<div class="table-responsive" id="Show_item_info"></div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Modal -->
</section>
<?php $this->load->view('header/footer'); ?>