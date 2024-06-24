<?php 
$this->load->view('front/header/header'); 
$this->load->view('front/header/menu');   

$Member_based_earning_flag = $Company_Details->Member_based_earning_flag;
?>
<header>
	<div class="container">
		<div class="row">
			<div class="col-12" style="height: 22px;">
			<!--<img style="height: 44px;" src="<?php echo base_url(); ?>assets/img/default-black-top.png">-->
			</div>
			<div class="col-12 d-flex justify-content-between align-items-center hedMain">
			
				<div class="leftRight"><button id="sidebarCollapse"><img src="<?php echo base_url(); ?>assets/img/menu.svg"></button></div>
				<div><img src="<?php echo base_url(); ?>assets/img/java-group-icon.svg"></div>
				<?php if($Member_based_earning_flag == 1) { ?>
				<div class="leftRight"><button onclick="location.href = '<?php echo base_url(); ?>index.php/Cust_home/Claim_points';"><!--<img src="<?php echo base_url(); ?>assets/img/points-history-icon.svg"></button><h1 style="width:104px; position: absolute; right: -2%;font-size: 14px;">Earn Points</h1>--></div>
				<?php } else { ?>
				<div class="leftRight"><button onclick="location.href = '<?php echo base_url(); ?>index.php/Cust_home/Generate_code';"><!--<img src="<?php echo base_url(); ?>assets/img/points-history-icon.svg"></button><h1 style="width:104px; position: absolute; right: -2%;font-size: 14px;">Earn Points</h1>--></div>
				<?php } ?>
			</div>
		</div>
	</div>
</header>
<main class="padTop padBottom">
	<section class="homeSlider">
		<div class="homeSlide">
			<div class="item">
				<img src="<?php echo base_url(); ?>assets/img/home-slide1.jpg" alt=" ">
			</div>
			<div class="item">
				<img src="<?php echo base_url(); ?>assets/img/home-slide2.jpg" alt=" ">
			</div>
			<div class="item">
				<img src="<?php echo base_url(); ?>assets/img/home-slide3.jpg" alt=" ">
			</div>
		</div>
	</section>
	<div class="container">
		<div class="row">
			<div class="col-12 homeTxt">
			<h4 class="text-center">The Java House Family </h4>
			<br>
				<!--<p>With over 22 years of nurturing business, Java House Group has one of the region’s most valuable
				brand portfolios, leading value share positions across multiple categories in East Africa.
				In a thriving industry with strong relative growth within the guest experience space, Java House Group is uniquely positioned for sustained growth.</p>-->
				<p>Java House is now one of the leading coffee brands in Africa and has grown to have outlets in 14 cities across 3 countries in East Africa (Kenya, Uganda and Rwanda). It has also birthed two sister brands Planet Yoghurt, a healthy, tasty and fun frozen yoghurt store and 360 Degrees Pizza, a casual dining restaurant. <br> “Welcome to Java. A home away from home”</p>
			</div>
		</div>
	</div>
</main>

<?php $this->load->view('front/header/footer');  ?>