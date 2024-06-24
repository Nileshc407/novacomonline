<?php $this->load->view('front/header/header'); ?>

<?php
	$Current_point_balance = ($Enroll_details->Total_balance-$Enroll_details->Debit_points);
	if($Current_point_balance<0){
		$Current_point_balance=0;
	}else{
		$Current_point_balance=$Current_point_balance;
	}
?>
		<div class="custom-body custom-height">
			<div class="inner-container">
				<div class="first-card">
					<div class="points-card">
						<div class="img-star">
						<img src="<?php echo base_url(); ?>assets/brand-0/images/points.png"></div>
						<div class="point-text">
						<p>You Have</p>
						<h3><?php echo $Current_point_balance; ?></h3>
						<h5><?php echo $Currency_name; ?></h5>
						</div>
					</div>
				</div>
				<!--<div class="view-wrap brand-details">
					<a href="<?php //echo base_url();?>index.php/Cust_home/statement">
						<div class="item">
							View Points History
							<div class="icon">
								<img class="points-history-icon" src="<?php echo base_url(); ?>assets/brand-0/images/right-arrow.png" alt="">
							</div>
						</div>
					</a>
					<!--<a href="#">
						<div class="item item-odd">
							View Stamp Collections
							<div class="icon">
								<img class="points-history-icon" src="<?php echo base_url(); ?>assets/brand-0/images/right-arrow.png" alt="">
							</div>
						</div>
					</a>--
				</div>-->
				
				<div class="accordion-card">
				<div class="accordion-in" id="accordion-main">
                    <div class="card">
                        <div class="card-header" id="accordion1">
                            <a href="<?php echo base_url();?>index.php/Cust_home/statement" class="btn btn-header-link collapsed dark-bg">View Points History</a>
                        </div>
                        <div id="accord1" class="collapse" aria-labelledby="accordion1" data-parent="#accordion-main">
                            <div class="card-body">
                                <div class="how-it-works-card">
                                	<div class="slider owl-carousel owl-theme">		
										
									</div>														
								</div>
							</div>
						</div>
					</div>
					<div class="card">
						<div class="card-header" id="accordion2">
							<a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#accord2" aria-expanded="true" aria-controls="accord2">View Stamp Collections</a>
						</div>
						<div id="accord2" class="collapse" aria-labelledby="accordion2" data-parent="#accordion-main">
							<div class="card-body p-0">
									<div class="brand-wrap">
									
										<?php if($brandDetails) { ?> 
										<?php foreach ($brandDetails as $key => $value) { 
										// echo"--Enrollement_id--".$value['Enrollement_id']."----";
											if($value['Enrollement_id'] != '127' && $value['Enrollement_id'] != '121' ) {
												?>
												<a href="<?php echo base_url(); ?>index.php/Cust_home/stamp_collection?brndID=<?php echo $value['Enrollement_id']; ?>">
													<div class="item brand-<?php echo $value['Enrollement_id']; ?> ">
														<img src="<?php echo base_url(); ?>assets/brand-<?php echo $value['Enrollement_id']; ?>/logo/color-logo.png"/>
													</div>
												</a>
											
											
											<?php }
											}  ?>
										<?php } ?>
									</div>
							</div>
						</div>
					</div>
					<div class="card">
                        <div class="card-header" id="accordion3">
                            <a href="<?php echo base_url();?>index.php/Cust_home/vouchers_listing" class="btn btn-header-link collapsed dark-bg">View Vouchers</a>
                        </div>
                        <div id="accord1" class="collapse" aria-labelledby="accordion3" data-parent="#accordion-main">
                            <div class="card-body">
                                <div class="how-it-works-card">
                                	<div class="slider owl-carousel owl-theme">		
										
									</div>														
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
		<?php $this->load->view('front/header/footer');  ?>
		<script>
			$( document ).ready(function() {
				$( ".card-header a" ).click(function() {
					$( ".custom-body" ).toggleClass( "hide-up" );
				});
			});  

			$( document ).ready(function() {
				$( "#accordion2 a" ).click(function() {
					$( ".custom-body" ).toggleClass( "hide-up-2" );
				});
			});  
		</script>