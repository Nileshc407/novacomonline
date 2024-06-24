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
	
		<?php if($Trans_details !=Null){ 
				foreach($Trans_details as $row){ 
					$Trans_date = date('d-M-Y', strtotime($row->Trans_date));
					// $Loyalty_pts = round($row->Loyalty_pts);
					$Loyalty_pts = floor($row->Loyalty_pts);
					$Redeem_pts = round($row->Redeem_pts);
					
					if($row->TransType == 2){
						$TransType = "POS";
					}else if($row->TransType == 12){
						if($row->Delivery_method == 28) {
							$Delivery_method1 = "Pick Up";
						} else if($row->Delivery_method == 29) { 
							$Delivery_method1 = "Delivery";
						} else if($row->Delivery_method == 107) { 
							$Delivery_method1 = "In-Store";
						} else {
							$Delivery_method1= " ";
						}
						$TransType = "Online - ".$Delivery_method1;
					}else if($row->TransType == 29){
						if($row->Delivery_method == 28) {
							$Delivery_method1 = "Take Away";
						} else if($row->Delivery_method == 29) { 
							$Delivery_method1 = "Delivery";
						} else if($row->Delivery_method == 107) { 
							$Delivery_method1 = "In-Store";
						} else {
							$Delivery_method1= " ";
						}
						$TransType = "Online - ".$Delivery_method1;
						if($row->Manual_billno == Null)
						{
							$row->Manual_billno = $row->Order_no;
						}
					}else if($row->TransType == 1){
						$TransType = "Bonus";
					}	
				?>
				<div class="box">
					<h2><?php echo $row->Seller_name; ?> <span class="date"><?php echo $Trans_date; ?></span></h2>
					
					<h2><?php echo $TransType; ?> <span class="date">Ref <span class="text-green"><?php echo $row->Manual_billno; ?></span></span></h2>
					
					<div class="d-flex align-items-center justify-content-between">
						<div class="label-box">
							Earned<span class="text-green"><?php echo $Loyalty_pts; ?></span>
						</div>
						<div class="text-right">
							<div class="label-box">
							Redeemed<span class="text-red"><?php echo $Redeem_pts; ?></span>
							</div>
						</div>
					
						
					</div>
				</div>
				<?php
				}
				
			} else { ?> 
					<div class="box">
					<h2 class="text-center">No Points Yet? 
					<br>
					<br>
					Visit any of our outlets and start earning points</h2>
					
					
					</div>
			<?php }?>
		</div>
<?php $this->load->view('front/header/footer');  ?>