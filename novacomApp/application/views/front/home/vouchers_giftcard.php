<?php $this->load->view('front/header/header');
$Current_point_balance = ($Enroll_details->Total_balance-$Enroll_details->Debit_points);		
if($Current_point_balance<0)
{
	$Current_point_balance=0;
}
else
{ 
	$Current_point_balance=$Current_point_balance;
}		

$ci_object = &get_instance(); 
$ci_object->load->model('Igain_model');
	
?> 
<body style="background-image:url('<?php echo base_url(); ?>assets/img/personal-bg.jpg')">
<div id="wrapper">
		<div class="custom-header">
			<div class="container">
				<div class="heading-wrap">
					<div class="icon back-icon">
						<a href="<?php echo base_url();?>index.php/Cust_home/front_home"></a>
					</div>
					<h2>Vouchers</h2>
				</div>
			</div>
		</div>
		<div class="custom-body select-location-body live_tab_show">
			<ul class="nav nav-tabs" id="myTab" role="tablist">
				<li class="nav-item" role="presentation">
					<a class="active" id="live-tab" data-toggle="tab" href="#Vouchers_view" role="tab" aria-controls="Vouchers_view" aria-selected="true">Vouchers</a>
				</li>
				<li class="nav-item" role="presentation">
					<a id="map-tab" data-toggle="tab" href="#Gift_card_view" role="tab" aria-controls="Gift_card_view" aria-selected="false">Gift Cards</a>
				</li>
			</ul>
			
			
				<div class="tab-content">
				  <div class="tab-pane fade show active" id="Vouchers_view" role="tabpanel" aria-labelledby="live-tab">
				  
					<div class="custom-body">
						<?php
						
						if($MyDiscountVouchers )
						{
							foreach($MyDiscountVouchers as $row)
							{ ?>
							<div class="box transition-box">
								<table width="100%">
									<?php /* ?>
									<tr>
										<td><b><?php echo $row->Gift_card_id; ?></b></td>
										<td>&nbsp;</td>
										<td style="text-align: right;"><span class="label-box">Issued On</span> <?php echo "<b>".date('d-M-Y',strtotime($row->Create_date))."</b>"; ?></td>								
									</tr>
									<tr>
										<td><b><?php 
												if($row->Payment_Type_id == 99){ echo "Discount Voucher";}
												if($row->Payment_Type_id == 998){ echo "Revenue Voucher";} 
												if($row->Payment_Type_id == 997){ echo "Product Voucher";} 
										?></b></td>
										<td>&nbsp;</td>
										<td style="text-align: right;"><span class="label-box">Valid Till</span> <?php echo "<b>".date('d-M-Y',strtotime($row->Valid_till))."</b>"; ?></td>								
									</tr> 
									
									
									
									
									
									<tr>
										<td><b>
										<?php 
											// if($row->Card_value > 0){ echo $Currency_Symbol.' '.number_format($row->Card_value,2); }
											
											if($row->Discount_percentage > 0)
											{ 
												echo $row->Discount_percentage.'%'; 
											} else {
												echo $Currency_Symbol.' '.number_format($row->Card_value,2);
											}
										
										?></b></td>
										<td>&nbsp;</td>
										<td><?php if($row->Card_balance > 0){ echo "<b style='color:green;'>Issued</b>"; } else { echo "<b style='color:red;'>Used</b>"; } ?></td>
										
									</tr> 
									<?php */ ?>
									
									
									
									
									<tr>
										<td><b><?php 
												if($row->Payment_Type_id == 99){ echo "Discount Voucher";}
												if($row->Payment_Type_id == 998){ echo "Revenue Voucher";} 
												if($row->Payment_Type_id == 997){ echo "Product Voucher";} 
										?></b></td>
										
										<td style="text-align: right;"><span class="label-box">Expiry</span> <?php echo "<b>".date('d-M-Y',strtotime($row->Valid_till))."</b>"; ?></td>		
									<tr>
									</tr>									
										<td><?php 
											if($row->Discount_percentage > 0)
											{ 
												echo $row->Discount_percentage.'%'; 
											} else {
												echo $Currency_Symbol.' '.number_format($row->Card_value,2);
											}
										
										?></td>
										<td style="text-align: right;"><span class="label-box">Voucher</span> <?php echo "<b>".$row->Gift_card_id."</b>"; ?></td>
											
									</tr>
									
								
									
									
									
								</table>
							</div> 
						<?php }
						}
						if($Unused_stamp_voucher) {
							
							foreach($Unused_stamp_voucher as $row)
							{ 
							
							
								// echo "--Seller_id---".$row->Seller_id."----<br>";
								$SellerDetails1= $ci_object->Igain_model->get_enrollment_details($row->Seller_id);
								// echo "--Sub_seller_Enrollement_id---".$SellerDetails1->Sub_seller_Enrollement_id."----<br>";
								$SellerDetails= $ci_object->Igain_model->get_enrollment_details($SellerDetails1->Sub_seller_Enrollement_id);
								// echo "--First_name---".$SellerDetails->First_name."----<br>";
								$Lastname= substr($SellerDetails->Last_name,0,8);
					
						?>
							<div class="box transition-box">
								<!-- <h2><?php echo $SellerDetails->First_name.' '.$Lastname; ?><span class="label-box">Expiry<b style="color: var(--dark);">&nbsp;<?php echo date('d-M-Y',strtotime($row->Valid_till)); ?></b></span></h2>
								
								<h2><?php echo $row->Offer_name; ?><span class="label-box">Voucher <b style="color: var(--dark);"><?php echo $row->Gift_card_id; ?></b></span></h2>
								-->
								
								<table width="100%">
									<tr>
										<td><b><?php echo $SellerDetails->First_name.' '.$Lastname; ?></b></td>
										
										<td style="text-align: right;"><span class="label-box">Expiry</span> <?php echo "<b>".date('d-M-Y',strtotime($row->Valid_till))."</b>"; ?></td>		
									<tr>
									</tr>									
										<td><?php echo $row->Offer_name; ?></td>
										<td style="text-align: right;"><span class="label-box">Voucher</span> <?php echo "<b>".$row->Gift_card_id."</b>"; ?></td>
											
									</tr>
									
								</table>
								
								
							</div>
							
						<?php }

						
						} 
						if($Unused_stamp_voucher == "" &&  $MyDiscountVouchers == "" )
						{ ?>
				
						<div class="box h-100 custom-form ptb-30">
							<div class="row">
								<div class="col-md-12" style="padding:0; margin:0;">
									<div style="position: absolute;top: 50%;left: 25%;">							
										<h6>Vouchers not available </h6>
									</div>
								</div>
							</div>
						</div>
					<?php } ?>
					</div>
				  </div>
				 
					
					
					<div class="tab-pane fade" id="Gift_card_view" role="tabpanel" aria-labelledby="live-tab">
						
						<div class="custom-body">	
							<?php
								if($MyGiftCard) {
									
									foreach($MyGiftCard as $gift) {
										
										/* if($gift->Card_balance>0){											
											$status="Issued";
										} else {
											$status="Used";
										} */
										
										
										
										?>								
										<div class="box transition-box">
											<table width="100%">
												<tr>
													<td><b>Gift Card</b></td>
													<td>&nbsp;</td>
													<td style="text-align: right;"><span class="label-box">Issued On</span> <?php echo date('d-M-Y',strtotime($gift->Create_date)); ?></td>								
												</tr>
												<tr>
													<td><b><?php echo $gift->Gift_card_id; ?></b></td>
													<td>&nbsp;</td>
													<td style="text-align: right;">
													<?php if($gift->Send_to_user != ''){ ?> <span class="label-box">Sent on </span> <?php echo date('d-M-Y',strtotime($gift->Update_date)); } else if($gift->Send_to_user == '' && $gift->Card_balance > 0) { ?> <span class="label-box">Valid Till</span> <?php echo date('d-M-Y',strtotime($gift->Valid_till));  } else { ?> <span class="label-box">Used on</span> <?php echo date('d-M-Y',strtotime($gift->Update_date)); } ?>
													</td>							
												</tr>
												<tr>
													<td><b><?php echo $Currency_Symbol.' '.number_format($gift->Card_value,2); ?></b></td>
													<td></td>
													<td></td>													
													
												</tr>
												<tr>
													<td><b>Status</b></td>
													<td></td>	
													
																																																<td style="text-align: right;">
														<?php if($gift->Send_to_user != ''){ echo "<b style='color:green;'>Sent To ".$gift->Send_to_user."</b>"; } else if($gift->Send_to_user == '' && $gift->Card_balance > 0) { echo "<b style='color:red;'>Issued</b>"; } else { echo "<b style='color:red;'>Used</b>"; } ?>
													</td>
												</tr>
												<?php 
												
												if($gift->Card_balance > 0){ ?>											
														<tr>
															<td colspan="3">
																<button type="button" class="cust-btn btn-block" onclick="window.location.href='<?php echo base_url(); ?>index.php/Cust_home/Send_gift_card/?Gift_card_id=<?php echo $gift->Gift_card_id; ?>'" >Send Gift Card</button>
															</td>
														</tr>
												 <?php } ?>
												
											</table>
										</div>
								 
									<?php 
									}
								
								} else { ?>
				
									<div class="box h-100 custom-form ptb-30">
										<div class="row">
											<div class="col-md-12" style="padding:0; margin:0;">
												<div style="position: absolute;top: 50%;left: 25%;">							
													<h6>Gift Card not available </h6>
												</div>
											</div>
										</div>
									</div>
								<?php } ?>
						</div>
						
				  </div>
				  
					
				 
				</div>
		</div>
<?php $this->load->view('front/header/footer');  ?>	