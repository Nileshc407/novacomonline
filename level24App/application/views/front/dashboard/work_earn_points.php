<?php 
$this->load->view('front/header/header'); 
$this->load->view('front/header/menu');  
?>
<header>
	<div class="container">
		<div class="row">
			<div class="col-12" style="height: 22px;"></div>
			<div class="col-12 d-flex justify-content-between align-items-center hedMain">
				<div class="leftRight"><button id="sidebarCollapse" onclick="location.href = '<?php echo base_url(); ?>index.php/Cust_home/works';" ><img src="<?php echo base_url(); ?>assets/img/back-icon.svg"></button></div>
				<div><h1>Earn Points</h1></div>
				<div class="leftRight">&nbsp;</div>
			</div>
		</div>
	</div>
</header>
<main class="padTop1 padBottom">
	<div class="container">
		<div class="row">
            
			<div class="col-12 howWorkWrapper">
                <section class="howWorkSliderHldr">
                    <div class="howWorkSlide">
                        <div><img src="<?php echo base_url(); ?>assets/img/work-img1.jpg" alt=" "></div>
                        <div><img src="<?php echo base_url(); ?>assets/img/work-img2.jpg" alt=" "></div>
                        <div><img src="<?php echo base_url(); ?>assets/img/work-img3.jpg" alt=" "></div>
                        <div><img src="<?php echo base_url(); ?>assets/img/work-img4.jpg" alt=" "></div>
                        <div><img src="<?php echo base_url(); ?>assets/img/work-img5.jpg" alt=" "></div>
                    </div>
                </section>
				<div class="workPointWrapper">
                    <span class="redTxt"></span> 24 reward works through any purchases made at any of our facilities, be in the gym or our restaurants. Whilst making a payment, use your mobile number and your points will be automatically updated. 
                </div>
			</div>
		</div>
	</div>
</main>
<?php $this->load->view('front/header/footer');  ?>
