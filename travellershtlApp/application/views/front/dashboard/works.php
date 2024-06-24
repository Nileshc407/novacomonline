<?php 
$this->load->view('front/header/header'); 
$this->load->view('front/header/menu');  
?>
<header>
	<div class="container">
		<div class="row">
			<div class="col-12" style="height: 22px;"></div>
			<div class="col-12 d-flex justify-content-between align-items-center hedMain">
				<div class="leftRight"><button id="sidebarCollapse" onclick="location.href = '<?php echo base_url(); ?>index.php/Cust_home/front_home';">
				<img src="<?php echo base_url(); ?>assets/img/back-icon.svg"></button></div>
				<div><h1>How it Works</h1></div>
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
				<ul class="WorkMenuHldr">
                    <li>
                        <a class="cf w-100" href="<?php echo base_url(); ?>index.php/Cust_home/work_earn_points">
                            <div class="cardMain d-flex align-items-center">
                                <div class="icon"><img src="<?php echo base_url(); ?>assets/img/earn-points-icon.svg"></div>
                                <div class="titleTxtMain">
                                    <h2>Earn Points</h2>
                                </div>
                                <div class="rightIcon ml-auto"><img src="<?php echo base_url(); ?>assets/img/right-icon.svg"></div>
                            </div>
                        </a>
                    </li>

                    <li>
                        <a class="cf w-100" href="<?php echo base_url(); ?>index.php/Cust_home/work_redeem_points">
                            <div class="cardMain d-flex align-items-center">
                                <div class="icon"><img src="<?php echo base_url(); ?>assets/img/redeem-points-icon.svg"></div>
                                <div class="titleTxtMain">
                                    <h2>Redeem Points</h2>
                                </div>
                                <div class="rightIcon ml-auto"><img src="<?php echo base_url(); ?>assets/img/right-icon.svg"></div>
                            </div>
                        </a>
                    </li>

                    <li>
                        <a class="cf w-100" href="<?php echo base_url(); ?>index.php/Cust_home/work_collect_stamps">
                            <div class="cardMain d-flex align-items-center">
                                <div class="icon"><img src="<?php echo base_url(); ?>assets/img/collect-stamps-icon.svg"></div>
                                <div class="titleTxtMain">
                                    <h2>Collect Stamps</h2>
                                </div>
                                <div class="rightIcon ml-auto"><img src="<?php echo base_url(); ?>assets/img/right-icon.svg"></div>
                            </div>
                        </a>
                    </li>

                </ul>
			</div>
		</div>
	</div>
</main>
<?php $this->load->view('front/header/footer');  ?>
