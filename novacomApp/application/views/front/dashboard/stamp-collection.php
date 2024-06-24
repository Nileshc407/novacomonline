<?php 
$this->load->view('front/header/header'); 
if($icon_src=="white") { $icon_src1="black"; } else { $icon_src1=$icon_src; }
if($icon_src=="green") { $foot_icon="white"; } else { $foot_icon=$icon_src; } 

$Current_point_balance = ($Enroll_details->Total_balance-$Enroll_details->Debit_points);
if($Current_point_balance<0){
	$Current_point_balance=0;
}else{
	$Current_point_balance=$Current_point_balance;
}
$ci_object = &get_instance(); 
	$ci_object->load->model('Igain_model');
	
	$session_data = $this->session->userdata('cust_logged_in');
		// $data['Company_id'] = $session_data['Company_id'];
		// $data['enroll'] = $session_data['enroll'];
?> 
<body style="background-image:url('<?php echo base_url(); ?>assets/img/statement-bg.jpg')">
	<div id="wrapper">
		<div class="custom-header">
			<div class="container">
				<div class="heading-wrap">
					<div class="icon back-icon">
						<a href="<?php echo base_url(); ?>index.php/Cust_home/front_home"></a>
					</div>
					<h2>Stamp Collection</h2>
				</div>
			</div>
		</div>
		<div class="custom-body">
		
				<div class="accordion-card">
				<div class="accordion-in" id="accordion-main">
					<?php 
					// echo "Here----";
					// print_r($brandStampDetails);
					$totalcnt = count($brandStampDetails);
					if($brandStampDetails){
						$Buy_item;
						$count=0;
						$countarray=array();
						$Merchandize_item_name;
						
						$j=0;
						$UnusedGiftCardCount=0;
						
						
						foreach($brandStampDetails as $stamp ) {
							
							$Merchandize_item_name= $stamp->Merchandize_item_name; 
							$Offer_code= $stamp->Offer_code; 
							$Offer_id= $stamp->Offer_id; 
							$Offer_name= $stamp->Offer_name; 
							$Offer_description= $stamp->Offer_description; 
							$Buy_item= $stamp->Buy_item; 
							$Free_item= $stamp->Free_item; 
							$TotalQty = $stamp->TotalQty; 
							$countarray[]=$stamp->Buy_item-$stamp->TotalQty;
							// $count=$Buy_item-$TotalQty;
							
							/* echo "---Seller_id-----".$stamp->Seller_id."----<br>";
							// echo "---Company_id-----".$stamp->Company_id."----<br>";
							
							$Sub_Seller_details = $ci_object->Igain_model->Fetch_Sub_Seller_details($session_data['Company_id'],$stamp->Seller_id);
							echo $this->db->last_query()."--------<br>";
							print_r($Sub_Seller_details);
							if($Sub_Seller_details){
								
								foreach($Sub_Seller_details as $outlet){
									
									echo "---outlet--Enrollement_id---".$outlet->Enrollement_id."----<br>";
								
								}
							} else {
								
							} */
							
							
							$UnusedGiftCardCount= $ci_object->Igain_model->Fetch_Seller_Stamp_unused_voucher($session_data['enroll'],$session_data['Company_id'],$Enroll_details->Card_id,$stamp->Seller_id,$Offer_code);
							
							// echo "---UnusedGiftCardCount-----".$UnusedGiftCardCount."----<br>";
							 // echo"--Offer_code---".$stamp->Offer_code."--TotalQty---".$stamp->TotalQty."---Buy_item---".$stamp->Buy_item."----Free_item---".$stamp->Free_item."---<br>";
							
							if($j % 2 == 0){
								$css="dark-bg";
							} else {
								$css="";
							}
							
						
						// $Buy_item_count=$TotalQty/$Buy_item;
						
						$Buy_item_count = fmod($TotalQty, $Buy_item);
						

						
					?>
						
						<div class="card" style="background-color: #fff;">
						<?php if($totalcnt > 1) { ?>
							<div class="card-header" id="accordion1">
								<a href="#" class="btn btn-header-link collapsed <?php echo $css; ?>" data-toggle="collapse" data-target="#accord1_<?php echo $Offer_id; ?>"
								aria-expanded="true" aria-controls="accord1_<?php echo $Offer_id; ?>" style="   padding: 10px 46px 10px 10px;font-size: 22px;"><?php echo $Offer_description; ?></a>
							</div>
						<?php } else { ?>
							
								
															
									<h6 class="text-center dark-bg p-2"><?php echo $Offer_description; ?></h6>
								
						<?php } ?>
						
							<div id="accord1_<?php echo $Offer_id; ?>" class="collapse show" aria-labelledby="accordion1" data-parent="#accordion-main">
								<div class="card-body">
									<div class="how-it-works-card">
										
										
											<?php

												// echo "---TotalQty-----".$TotalQty."----<br>";												
												// echo "---Buy_item-----".$Buy_item."----<br>";
												
												

												
												
												
												/* $totalFreeItem=floor($TotalQty/$Buy_item);
												// echo "---totalFreeItem-----".$totalFreeItem."----<br>";
												if($totalFreeItem >0){
													
													echo'<h5 class="drink-text">You have received '.( $totalFreeItem*$stamp->Free_item).' Free Vouchers.</h5>';
												} */
												
												$data=array();
												for($i=0;$i<$Buy_item;$i++) {
													$data[]=$i.',';
												}

												
												/* $break_after = 3;

													$counter = 0;   
													$totalNumber = count($data);   
													$nwcnt=$totalNumber-1;
													foreach ($data as $item) {
														
														if ($counter % $break_after == 0) {
															echo '<ul class="list-group list-group-horizontal drink-list d-flex    align-items-start" style="margin-top: 15px;margin-left: 30px;">';
														} 
														
														
														if($counter >= $Buy_item_count){
																
																														
															?>
															 
															<li>
																<span><img src="<?php echo base_url(); ?>assets/img/light.svg"></span>
																
															</li>
															 
														<?php } else { ?>
															<li>
																<img src="<?php echo base_url(); ?>assets/img/dark.svg">
																
															</li>
															<?php  
															}  ?>
															
															
																
														<?php  

														if ($counter % $break_after == ($break_after-1) || $counter == $totalNumber-1) {
															echo '</ul>';
														}
														++$counter;

													} */


										 ?>	
											<?php
											//initialize a counter 
													$count = 0;
													//start the table 
													echo("<table align='center'><tr>"); 
													foreach ($data as $product) {

													//if it's divisible by 5 then we echo a new row 
													if(($count % 3) == 0){

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
																	<span><img src="<?php echo base_url(); ?>assets/img/light.svg"></span>
																	
															<td>
														<?php
															
															
														} else {
															
															
															?>
															<td>
																	<span><img src="<?php echo base_url(); ?>assets/img/dark.svg"></span>
																	
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
												// $totalFreeItem1=$UnusedGiftCardCount;
												// echo "---totalFreeItem-----".$totalFreeItem."----<br>";
												// echo "---UnusedGiftCardCount-----".$UnusedGiftCardCount."----<br>";
												if($totalFreeItem > 0 && $UnusedGiftCardCount > 0 ){
													
													echo'<h6 class="text-center dark-bg p-2">You have '.( $UnusedGiftCardCount).' Free Vouchers.</h6>';
												}
										 
												$data1=array();
												for($i=0;$i<$Free_item;$i++) {
													$data1[]=$i.',';
												}
												
													
												/* $break_after = 3;

													$counter = 0;   
													$totalNumber = count($data1);   
													$nwcnt=$totalNumber-1;
													foreach ($data1 as $item) {
														
														if ($counter % $break_after == 0) {
															echo '<ul class="list-group list-group-horizontal drink-list d-flex    align-items-start" style="margin-top: 15px;margin-left: 30px;">';
														}										
																
														// if($Buy_item >= $TotalQty){	
														if($Buy_item >= $Buy_item_count){	
														
															  ?>
															<li>	
																<b style="text-align: center;margin-left: 22%;">FREE</b>
																<span><img src="<?php echo base_url(); ?>assets/img/light.svg"></span><br>
																
															</li>
															  
														<?php }  else {
																
																
															?>
															<li>
																<img src="<?php echo base_url(); ?>assets/img/dark.svg"><br>
																<b style="text-align: center;margin-left: 5%;"><?php echo $text; ?></b>
															</li>
															<?php  
															 }  
															?>
															
															
																
														<?php
														if ($counter % $break_after == ($break_after-1) || $counter == $totalNumber-1) {
															echo '</ul>';
														}
														++$counter;

													} */

												
										?>
										
										<?php
											//initialize a counter 
													$count1 = 0;
													//start the table 
													echo("<table align='left'><tr>"); 
													foreach ($data1 as $product1) {

													//if it's divisible by 5 then we echo a new row 
													if(($count1 % 3) == 0){

													echo("</tr><tr >\n"); 
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
																	<span><img src="<?php echo base_url(); ?>assets/img/light.svg" style="width:40%;margin-left: 20px;"></span>
																	
															<td>
														<?php
															
															
														} else {
															
															
															?>
															<td>
																	
																<b style="text-align: center;margin-left: 4%;"><?php echo $text; ?></b><br>
																<img src="<?php echo base_url(); ?>assets/img/dark.svg" style="width:34%">
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
<?php $this->load->view('front/header/footer');  ?>

<script>

	/* var timer, delay = 5000; //5 minutes counted in milliseconds.
	var TotalQty=<?php echo $TotalQty;?>;
		timer = setInterval(function(){
			$.ajax({
			  type: 'POST',
			  data: {brndID:<?php echo $brndID; ?>},
			  url: '<?php echo base_url()?>index.php/Cust_home/stamp_collection_count',
			  success: function(data){
				
				console.log('\n data.....'+data);
				console.log('\n TotalQty.....'+TotalQty);
				if(data > 0){
					
					if(data != TotalQty){
						
						location.reload();
					}
				}				
			  }
			});
		}, delay); */
		
		
</script>
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