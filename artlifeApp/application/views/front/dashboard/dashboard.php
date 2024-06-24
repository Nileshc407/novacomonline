<?php $this->load->view('front/header/header'); ?>
		<div class="custom-body">
			<div class="first-card">
				<div class="slider owl-carousel owl-theme">
					<div class="item">
						<img src="<?php echo base_url(); ?>assets/brand-<?php echo $_SESSION['brndID']; ?>/images/banner-1.jpg"/>
					</div>
					<div class="item">
						<img src="<?php echo base_url(); ?>assets/brand-<?php echo $_SESSION['brndID']; ?>/images/banner-2.jpg"/>
					</div>
					<div class="item">
						<img src="<?php echo base_url(); ?>assets/brand-<?php echo $_SESSION['brndID']; ?>/images/banner-3.jpg"/>
					</div>
					<div class="item">
						<img src="<?php echo base_url(); ?>assets/brand-<?php echo $_SESSION['brndID']; ?>/images/banner-4.jpg"/>
					</div>
				</div>
				<div class="welcome-card">
										 
					<p>Inspired by our love of good food, Artlife curates your lifestyle around gourmet dining and food shopping experiences in the hub of Nairobi.</p> <p> Earn and redeem points across the city when you dine in, order for delivery or shop online with ANY of our brands.</p>  <p> Enjoy your favourite restaurants and food brands in Nairobi today…and reap rewards along the way!</p>
				</div>
			</div>
			<div class="accordion-card">
				<div class="accordion-in" id="accordion-main">
                    <div class="card">
                        <div class="card-header" id="accordion1">
                            <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#accord1" aria-expanded="true" aria-controls="accord1">Select Your Brand</a>
                        </div>
                        <div id="accord1" class="collapse" aria-labelledby="accordion1" data-parent="#accordion-main">
						
					
								<div class="card-body p-0">
									<div class="brand-wrap">
										<?php if($brandDetails) { ?> 
										<?php foreach ($brandDetails as $key => $value) { 
										//echo"--Enrollement_id--".$value['Enrollement_id']."";
										?>
										
										
										
										<a href="<?php echo base_url(); ?>index.php/Cust_home/set_brand?brndID=<?php echo $value['Enrollement_id']; ?>">
											<div class="item brand-<?php echo $value['Enrollement_id']; ?> ">
												<img src="<?php echo base_url(); ?>assets/brand-<?php echo $value['Enrollement_id']; ?>/logo/color-logo.png"/>
											</div>
										</a>
										
										
										<?php  }  ?>
										<?php } ?>
									</div>
								</div>
							 
                        </div>
                    </div>
                </div>
			</div>
			
			<?php /* ?>
			<div class="welcome-text">
				<h5>WELCOME!</h5>
				<p>To Nairobi’s first multi-brand <br/>Loyalty and Lifestyle App</p>
			</div>
			<div class="brand-wrap shadow-less">

				<?php if($brandDetails) { ?> 
						<?php foreach ($brandDetails as $key => $value) { 
							//echo"--Enrollement_id--".$value['Enrollement_id']."";
							?>
								

								<a href="<?php echo base_url(); ?>index.php/Cust_home/set_brand?brndID=<?php echo $value['Enrollement_id']; ?>">
									<div class="item brand-<?php echo $value['Enrollement_id']; ?> ">
										<img src="<?php echo base_url(); ?>assets/brand-<?php echo $value['Enrollement_id']; ?>/logo/w-logo.png"/>
									</div>
								</a>

						<?php  }  ?>
				<?php } ?>
				

				<a href="<?php echo base_url(); ?>index.php/Cust_home/set_brand?brndID=1&brndname=artcaffe">
					<div class="item" style="background-color:#312212;">
						<img src="<?php echo base_url(); ?>assets/artcaffe/logo/w-logo-1.png"/>
					</div>
				</a>
				<a href="<?php echo base_url(); ?>index.php/Cust_home/set_brand?brndID=7&brndname=artcaffemarket">
					<div class="item" style="background-color:#374F63;">
						<img src="<?php echo base_url(); ?>assets/artcaffemarket/logo/w-logo.png"/>
					</div>
				</a>
				<a href="<?php echo base_url(); ?>index.php/Cust_home/set_brand?brndID=3&brndname=urban">
					<div class="item" style="background-color:#FFD000;">
						<img src="<?php echo base_url(); ?>assets/urban/logo/w-logo-2.png"/>
					</div>
				</a>
				<a href="<?php echo base_url(); ?>index.php/Cust_home/set_brand?brndID=2&brndname=shiba">
					<div class="item" style="background-color:#71BF44;">
						<img src="<?php echo base_url(); ?>assets/shiba/logo/w-logo-6.png"/>
					</div>
				</a>
				
				<a href="<?php echo base_url(); ?>index.php/Cust_home/set_brand?brndID=4&brndname=ohcha">
					<div class="item" style="background-color:#DB4A23;">
						<img src="<?php echo base_url(); ?>assets/ohcha/logo/w-logo-3.png"/>
					</div>
				</a>
				<a href="<?php echo base_url(); ?>index.php/Cust_home/set_brand?brndID=5&brndname=tapas">
					<div class="item" style="background-color:#81151F;">
						<img src="<?php echo base_url(); ?>assets/tapas/logo/w-logo-4.png"/>
					</div>
				</a>
				<a href="<?php echo base_url(); ?>index.php/Cust_home/set_brand?brndID=6&brndname=dormans">
					<div class="item" style="background-color:#71BF44;">
						<img src="<?php echo base_url(); ?>assets/dormans/logo/w-logo-5.png"/>
					</div>
				</a>
				
			</div><?php */ ?>
		</div>
<?php $this->load->view('front/header/footer');  ?>
<style>
	.collapsing {
  transition: none !IMPORTANT;
}
</style>
        