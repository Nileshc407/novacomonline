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
<h1>Gift Cards</h1>	 
</section>
<ul class="nav nav-tabs" id="myTab" role="tablist">
	<li class="nav-item" role="presentation">
		<a href="<?php echo base_url()?>index.php/Cust_home/Vouchers_giftcard">Vouchers</a>
	</li>
	<li class="nav-item" role="presentation">
		<a href="<?php echo base_url()?>index.php/Cust_home/Giftcard">Gift Cards</a>
	</li>
</ul>
<?php if($Enroll_details->Card_id == '0' || $Enroll_details->Card_id== ""){ ?>
<script>
		BootstrapDialog.show({
		closable: false,
		title: 'Application Information',
		message: 'You have not been assigned Membership ID yet ...Please visit nearest outlet.',
		buttons: [{
			label: 'OK',
			action: function(dialog) {
				window.location='<?php echo base_url()?>index.php/Cust_home/home';
			}
		}]
	});
	runjs(Title,msg);
</script>
<?php }

	if(@$this->session->flashdata('Items_flash'))
	{
	?>
		<script>
			var Title = "Application Information";
			var msg = '<?php echo $this->session->flashdata('Items_flash'); ?>';
			runjs(Title,msg);
		</script>
	<?php
	}		
?>
<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12" id="customer-orders">
			<div class="box">
				<div class="table-responsive">
					<table class="table table-hover">
						<thead>
							<tr>
								<th>Gift Card No.</th>
								<th>Amount (<?php echo $Currency_Symbol; ?>)</th>
								
								<th>Issued On</th>
								<th>Remarks</th>
								<th>Status</th>
								<th>Action</th>
								<th>&nbsp;</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							if($MyGiftCard !="")
							{
								foreach($MyGiftCard as $gift)
								{ ?>
									<tr>
										<td><?php echo $gift->Gift_card_id; ?></td>
										<td><?php echo $Currency_Symbol.' '.number_format($gift->Card_value,2); ?></td>
										<td><?php echo date('d-M-Y',strtotime($gift->Create_date)); ?></td>	
										<td><?php if($gift->Send_to_user != ''){ ?> <span class="label-box">Sent on </span> <?php echo date('d-M-Y',strtotime($gift->Update_date)); } else if($gift->Send_to_user == '' && $gift->Card_balance > 0) { ?> <span class="label-box">Valid Till</span> <?php echo date('d-M-Y',strtotime($gift->Valid_till));  } else { ?> <span class="label-box">Used on</span> <?php echo date('d-M-Y',strtotime($gift->Update_date)); } ?></td>	
										<td><?php if($gift->Send_to_user != ''){ echo "<b style='color:green;'>Sent To ".$gift->Send_to_user."</b>"; } else if($gift->Send_to_user == '' && $gift->Card_balance > 0) { echo "<b style='color:green;'>Issued</b>"; } else { echo "<b style='color:red;'>Used</b>"; } ?></td>
										<?php if($gift->Card_balance > 0){ ?>	
										<td><button type="button" class="btn btn-light dark" onclick="window.location.href='<?php echo base_url(); ?>index.php/Cust_home/Send_gift_card/?Gift_card_id=<?php echo $gift->Gift_card_id; ?>'" >Send Gift Card</button></span></td>
										<?php } ?>
										<td>
										<td>&nbsp;</td>
									</tr>
								<?php
								}
							}
							else
							{?>
							<tr><td colspan="4" class="text-center"><?php echo ('No Records Found'); ?></td></tr>	
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