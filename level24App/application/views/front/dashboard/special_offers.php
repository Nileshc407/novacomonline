<?php $this->load->view('front/header/header'); ?>

<?php
	$Current_point_balance = ($Enroll_details->Total_balance-$Enroll_details->Debit_points);
	if($Current_point_balance<0){
		$Current_point_balance=0;
	}else{
		$Current_point_balance=$Current_point_balance;
	}
	
?>	
<header>
	<div class="container">
		<div class="row">
			<div class="col-12" style="height: 22px;"></div>
			<div class="col-12 d-flex justify-content-between align-items-center hedMain">
				<div class="leftRight"><button id="sidebarCollapse" onclick="location.href = '<?php echo base_url(); ?>index.php/Cust_home/front_home';">
				<img src="<?php echo base_url(); ?>assets/img/back-icon.svg"></button></div>
				<div><h1>Special Offers</h1></div>
				<div class="leftRight">&nbsp;</div>
			</div>
		</div>
	</div>
</header>			
<main class="padTop padBottom">
	<div class="container">
		<div class="row">
			<div class="col-12 specialOfferWrapper">
				<!--<ul class="offerHldr">
					<?php if($BrandImages) { ?> 
					<?php foreach ($BrandImages as $key => $value) { 
					
					?>
					
						<li>								
							<img src="<?php echo $value['Spl_Image']; ?>"/>
						</li>
							
					<?php  }  ?>
					<?php } else { ?>
														
							<p class="text-center"> No Special Offers
							</p>
						
					<?Php } ?>
                </ul>-->
				<ul class="offerHldr">
                    <li><a href="#"><img src="<?php echo base_url(); ?>assets/img/offer1.jpg"></a></li>
                    <li><a href="#"><img src="<?php echo base_url(); ?>assets/img/offer2.jpg"></a></li>
                    <li><a href="#"><img src="<?php echo base_url(); ?>assets/img/offer3.jpg"></a></li>
                    <li><a href="#"><img src="<?php echo base_url(); ?>assets/img/offer4.jpg"></a></li>
                    <li><a href="#"><img src="<?php echo base_url(); ?>assets/img/offer5.jpg"></a></li>
                </ul>
			</div>
		</div>
	</div>
</main>				
<?php $this->load->view('front/header/footer');  ?>