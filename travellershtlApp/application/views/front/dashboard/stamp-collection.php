<?php 
$this->load->view('front/header/header'); 
$ci_object = &get_instance(); 
$ci_object->load->model('Igain_model');
$session_data = $this->session->userdata('cust_logged_in');
?> 
<header>
	<div class="container">
		<div class="row">
			<div class="col-12" style="height: 22px;"></div>
			<div class="col-12 d-flex justify-content-between align-items-center hedMain">
				<div class="leftRight"><button onclick="location.href = '<?php echo base_url(); ?>index.php/Cust_home/Redeem_history';" ><img src="<?php echo base_url(); ?>assets/img/back-icon.svg"></button></div>
				<div><h1>Your Stamp Collections</h1></div>
				<div class="leftRight">&nbsp;</div>
			</div>
		</div>
	</div>
</header>
<main class="padTop padBottom">
	<div class="container">
		<div class="row">
			<div class="col-12 stampVoucherWrapper">
				<div class="accordion-in" id="accordion-main">
					<?php 
					$totalcnt = count($brandStampDetails);
					if($brandStampDetails)
					{
						$Buy_item;
						$count=0;
						$countarray=array();
						$Merchandize_item_name;
						$j=0;
						$UnusedGiftCardCount=0;
						
						foreach($brandStampDetails as $stamp ) 
						{	
							$Merchandize_item_name= $stamp->Merchandize_item_name; 
							$Offer_code= $stamp->Offer_code; 
							$Offer_id= $stamp->Offer_id; 
							$Offer_name= $stamp->Offer_name; 
							$Offer_description= $stamp->Offer_description; 
							$Buy_item= $stamp->Buy_item; 
							$Free_item= $stamp->Free_item; 
							$TotalQty = $stamp->TotalQty; 
							$countarray[]=$stamp->Buy_item-$stamp->TotalQty;
						
							$UnusedGiftCardCount= $ci_object->Igain_model->Fetch_Seller_Stamp_unused_voucher($session_data['enroll'],$session_data['Company_id'],$Enroll_details->Card_id,$stamp->Seller_id,$Offer_code);
							
							if($j % 2 == 0){
								$css="dark-bg";
							} else {
								$css="";
							}
							
						$Buy_item_count = fmod($TotalQty, $Buy_item);
					?>
						<div class="card" style="background-color: #fff;">
						<?php if($totalcnt > 1) { ?>
							<div class="card-header" id="accordion1">
								<a href="#" class="btn btn-header-link collapsed <?php echo $css; ?>" data-toggle="collapse" data-target="#accord1_<?php echo $Offer_id; ?>"
								aria-expanded="true" aria-controls="accord1_<?php echo $Offer_id; ?>" style="   padding: 10px 46px 10px 10px;font-size: 20px;"><?php echo $Offer_description; ?></a>
							</div>
						<?php } else { ?>					
								<h1><?php echo $Offer_description; ?></h1>
						<?php } ?>
						
							<div id="accord1_<?php echo $Offer_id; ?>" class="collapse show" aria-labelledby="accordion1" data-parent="#accordion-main">
								<div class="card-body">
									<div class="how-it-works-card">
									<?php
										$data=array();
										for($i=0;$i<$Buy_item;$i++) {
											$data[]=$i.',';
										}
										
										$count = 0;
										
										echo("<table align='center'><tr>"); 
										foreach ($data as $product) {

										if(($count % 4) == 0){
											echo("</tr><tr style='text-align: center;'>\n"); 
											$count++;
										}//if 
										else{ 
											$count++; 
										}
											// echo("<td>here<td>");
											
											if($count > $Buy_item_count){
												?>
												<td>
													<!--<span><img src="<?php echo base_url(); ?>assets/img/light.svg"></span>-->	
													
													<div class="stampHldr disable">
														<div class="d-flex align-items-center proHldr">
															<div class="flex-grow-1 proName">
																<img src="<?php echo base_url(); ?>assets/img/ice-cup.png">
															</div>
															<div class="proImg"><img src="<?php echo base_url(); ?>assets/img/ice-cup.png"></div>
														</div>
													</div>
												<td>
											<?php
											} else {
												?>
												<td>
													<!--<span><img src="<?php echo base_url(); ?>assets/img/dark.svg"></span>-->	
													
													<div class="stampHldr">
														<div class="d-flex align-items-center proHldr">
															<div class="flex-grow-1 proName">
																<img src="<?php echo base_url(); ?>assets/img/ice-cup.png">
															</div>
															<div class="proImg"><img src="<?php echo base_url(); ?>assets/img/ice-cup.png"></div>
														</div>
													</div>
												<td>
											<?php
											}
										}//foreach
												//close the table 
												echo("</tr></table>");
											?>
										<hr>									 
										 <?php 
											$totalFreeItem=floor($TotalQty/$Buy_item);
											
											if($totalFreeItem > 0 && $UnusedGiftCardCount > 0 ){	
												echo'<h6 class="text-center dark-bg p-2">You have '.( $UnusedGiftCardCount).' Free Vouchers.</h6>';
											}
										 
											$data1=array();
											for($i=0;$i<$Free_item;$i++) {
												$data1[]=$i.',';
											}
									
											$count1 = 0;
											//start the table 
											echo("<table align='left'><tr>"); 
											foreach ($data1 as $product1) {
											//if it's divisible by 5 then we echo a new row 
											if(($count1 % 4) == 0){

											echo("</tr><tr>\n"); 
												$count1++;

											}//if 
											else{ 
											$count1++; 
											}
											// echo("<td>here<td>");
														
											if($Buy_item >= $Buy_item_count){			
												?>
												<td>
													<b style="text-align: center;margin-left: 30px;">FREE</b><br>
													<!--<span><img src="<?php echo base_url(); ?>assets/img/light.svg" style="width:40%;margin-left: 20px;"></span>-->

													<div class="stampHldr disable">
														<div class="d-flex align-items-center proHldr">
															<div class="flex-grow-1 proName">
																<img src="<?php echo base_url(); ?>assets/img/ice-cup.png">
															</div>
															<div class="proImg"><img src="<?php echo base_url(); ?>assets/img/ice-cup.png"></div>
														</div>
													</div>																
												<td>
														<?php	
												} else {
													?>
													<td>	
														<b style="text-align: center;margin-left: 4%;"><?php echo $text; ?></b><br>
														
														<!--<img src="<?php echo base_url(); ?>assets/img/dark.svg" style="width:34%">-->
														
														<div class="stampHldr">
															<div class="d-flex align-items-center proHldr">
																<div class="flex-grow-1 proName">
																	<img src="<?php echo base_url(); ?>assets/img/ice-cup.png">
																</div>
																<div class="proImg"><img src="<?php echo base_url(); ?>assets/img/ice-cup.png"></div>
															</div>
														</div>
													<td>
												<?php
												}
											}//foreach
												//close the table 
												echo("</tr></table>");
											?>
									</div>
								</div>
							</div>
						</div>
					<?php 
						$j++;
						}
					} else { ?> 
						<div class="card mt-5" style="display:block">
							<div class="card-header">							
								<h6 class="text-center dark-bg p-2" style="background-color:rgb(255 250 242)"><b>No records found</b></h6>
							</div>
						</div>						
					<?php 
					}
					?>
                </div>				
			</div>
		</div>
	</div>
</main>
<?php $this->load->view('front/header/footer');  ?>
<style>
ul {
  list-style-type: none;
}
img{
	    /* margin-left: 20px; */
		width:70%;
}

#wrapper .custom-body {
    
    background: #ffffff;
}
</style>