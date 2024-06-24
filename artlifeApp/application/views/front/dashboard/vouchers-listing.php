<?php $this->load->view('front/header/header'); ?>
<?php
	$Current_point_balance = ($Enroll_details->Total_balance-$Enroll_details->Debit_points);
	if($Current_point_balance<0){
		$Current_point_balance=0;
	}else{
		$Current_point_balance=$Current_point_balance;
	}
	$ci_object = &get_instance(); 
	$ci_object->load->model('Igain_model');
?> 
	<div class="custom-body">
	
		<?php 
		// print_r($Unused_stamp_voucher);
		if($Unused_stamp_voucher !=Null){ 
				foreach($Unused_stamp_voucher as $row){ 
				
				// echo "--Seller_id---".$row->Seller_id."----<br>";
					$SellerDetails1= $ci_object->Igain_model->get_enrollment_details($row->Seller_id);
					// echo "--Sub_seller_Enrollement_id---".$SellerDetails1->Sub_seller_Enrollement_id."----<br>";
					$SellerDetails= $ci_object->Igain_model->get_enrollment_details($SellerDetails1->Sub_seller_Enrollement_id);
					// echo "--First_name---".$SellerDetails->First_name."----<br>";
					
					$Lastname= substr($SellerDetails->Last_name,0,8);
					
					?>
					
					<div class="box">
					<h2><?php echo $SellerDetails->First_name.' '.$Lastname; ?><span class="date"><?php echo date('d-M-Y',strtotime($row->Valid_till)); ?></span></h2>
					
					<h2><?php echo $row->Offer_name; ?><span class="date">Voucher <span class="text-green"><?php echo $row->Gift_card_id; ?></span></span></h2>
					
					<!--<div class="d-flex align-items-center justify-content-between">
						<div class="label-box">
							Earned<span class="text-green"><?php echo $Loyalty_pts; ?></span>
						</div>
						<div class="text-right">
							<div class="label-box">
							Redeemed<span class="text-red"><?php echo $Redeem_pts; ?></span>
							</div>
						</div>
					
						
					</div>-->
				</div>
					
					
					<!--<div class="box">
						<h2><?php echo $SellerDetails->First_name.' '.$SellerDetails->Last_name; ?> </h2>
							
							<div class="label-box"><?php echo $row->Offer_name; ?></div>
							<div class="label-box">
								Valid Date:<span class="text-red"><span class="date"><?php echo $row->Valid_till; ?></span>
							</div>
							<div class="label-box">
								Voucher No:<span class="text-green"><?php echo $row->Gift_card_id; ?></span>
							</div>
					</div>-->
				<?php
					
				}
				
			} else { ?> 
					<div class="box">
					<h2 class="text-center">No Vouchers Yet! 
					<br>
					<br>
					Visit any of our outlets and start earning points</h2>
					
					
					</div>
			<?php }?>
		</div>
<?php $this->load->view('front/header/footer');  ?>