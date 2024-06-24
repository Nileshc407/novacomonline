<?php 
$this->load->view('front/header/header'); ?>
<header>
	<div class="container">
		<div class="row">
			<div class="col-12" style="height: 22px;"></div>
			<div class="col-12 d-flex justify-content-between align-items-center hedMain">
				<div class="leftRight"><button id="sidebarCollapse" onclick="location.href = '<?php echo base_url(); ?>index.php/Cust_home/front_home';" ><img src="<?php echo base_url(); ?>assets/img/back-icon.svg"></button></div>
				<div><h1>Location</h1></div>
				<div class="leftRight">&nbsp;</div>
			</div>
		</div>
	</div>
</header>

<main class="padTop1">
	<div class="container">
		<div class="row">
			<div class="col-12 locationWrapper px-0">
                <!--<div class="locationSearch">
                    <input type="text" placeholder="Search.." name="search">
                </div>-->
                <div class="locationHldr scrollbarMain">
                    <ul class="addressHldr">
                        <li class="d-flex align-items-center">
                            <div class="addressMain">
                                <p><b>LEVEL 24</b></p>
                                <p>Le`Mac Building, </p>
                                <p>24th floor,</p>
                                <p>Church Road,</p>
                                <p>Westlands Nairobi</p>
                            </div>
                        </li>
                    </ul>
                </div>
				<div class="map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d31910.647698778248!2d36.775130202624126!3d-1.2746981354358287!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sjava%20house%20near%20ABC%20Place%2C%20Nairobi%2C%20Kenya!5e0!3m2!1sen!2sin!4v1630038326592!5m2!1sen!2sin"  style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
			</div>
		</div>
	</div>
</main>
<?php $this->load->view('front/header/footer');  ?>