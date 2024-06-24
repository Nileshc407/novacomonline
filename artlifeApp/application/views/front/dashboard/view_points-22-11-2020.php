<?php $this->load->view('front/header/header'); ?>

<?php
	$Current_point_balance = ($Enroll_details->Total_balance-$Enroll_details->Debit_points);
	if($Current_point_balance<0){
		$Current_point_balance=0;
	}else{
		$Current_point_balance=$Current_point_balance;
	}
?> 
	<div class="custom-body">
			<div class="first-card">
				<div class="points-card">
					<img src="<?php echo base_url(); ?>assets/brand-0/images/points.png" alt="">
					<p>You Have</p>
					<h3><?php echo $Current_point_balance; ?></h3>
					<h5><?php echo $Currency_name; ?></h5>
				</div>
			</div>
			<div class="view-wrap brand-details">
				<a href="<?php echo base_url();?>index.php/Cust_home/statement">
					<div class="item">
						View Points History
						<div class="icon">
							<img class="points-history-icon" src="<?php echo base_url(); ?>assets/brand-0/images/right-arrow.png" alt="">
						</div>
					</div>
				</a>
			</div>
		</div>
<?php $this->load->view('front/header/footer');  ?>