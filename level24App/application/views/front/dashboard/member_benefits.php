<?php 
$this->load->view('front/header/header'); 
$this->load->view('front/header/menu');   
?>
<header>
	<div class="container">
		<div class="row">
			<div class="col-12" style="height: 22px;"></div>
			<div class="col-12 d-flex justify-content-between align-items-center hedMain">
				<div class="leftRight"><button id="sidebarCollapse" onclick="location.href = '<?php echo base_url(); ?>index.php/Cust_home/front_home';" ><img src="<?php echo base_url(); ?>assets/img/back-icon.svg"></button></div>
				<div><h1>Member Benefits</h1></div>
				<div class="leftRight">&nbsp;</div>
			</div>
		</div>
	</div>
</header>
<main class="padTop padBottom">
	<div class="container">
		<div class="row BenefitsWrapper">
			<div class="col-12">
                <div class="cardMain mb-4">
                    <ul class="benefitsHldr">
                        <li><img src="<?php echo base_url(); ?>assets/img/rewards-icon.svg"></li>
                        <li><h2>Exclusive rewards On Food</h2></li>
                        <li>Try some new food with a special exclusive rewards on all the food in our menu.</li>
                    </ul>
                </div>

                <div class="cardMain mb-4">
                    <ul class="benefitsHldr">
                        <li><img src="<?php echo base_url(); ?>assets/img/birthday-voucher-icon.svg"></li>
                        <li><h2>Free Birthday Voucher</h2></li>
                        <li>Let us wish you a happy birthday with a free Birthday Voucher delivery.</li>
                    </ul>
                </div>

                <div class="cardMain mb-4">
                    <ul class="benefitsHldr">
                        <li><img src="<?php echo base_url(); ?>assets/img/special-promotions-icon.svg"></li>
                        <li><h2>Offer And Special Promotions</h2></li>
                        <li>Discover the special promotions dedicated to you</li>
                    </ul>
                </div>

			</div>
		</div>
	</div>
</main>
<?php $this->load->view('front/header/footer');  ?>