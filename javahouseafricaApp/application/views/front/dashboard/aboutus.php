<?php 
$this->load->view('front/header/header'); 
?>
<header>
	<div class="container">
		<div class="row">
			<div class="col-12" style="height: 44px;"></div>
			<div class="col-12 d-flex justify-content-between align-items-center hedMain">
				<div class="leftRight"><a href="<?php echo base_url(); ?>index.php/Cust_home/front_home"><img src="<?php echo base_url(); ?>assets/img/back-icon.svg"></a></div>
				<div><h1>Feedback</h1></div>
				<div class="leftRight">&nbsp;</div>
			</div>
		</div>
	</div>
</header>
<main class="padTop commonRoundWrapper feedbackWrapper">
    <div class="BoxHldr marBottom">
        <div class="container">
            <div class="row">
                <div class="col-6 pr-2">
                    <a href="<?php echo base_url().'index.php/Cust_home/qrsacn'?>" class="pointsLink">
                        <i><img src="<?php echo base_url(); ?>assets/img/icons/feedback-scan-icon.svg"></i>
                        <div class="linkName">Scan QR code for feedback</div>
                    </a>
                </div>
                <div class="col-6 pl-2">
                    <a href="<?php echo base_url().'index.php/Cust_home/contactus'?>" class="pointsLink">
                        <i><img src="<?php echo base_url(); ?>assets/img/icons/feedback-like-tag-icon.svg"></i>
                        <div class="linkName">Click here to give us your feedback</div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</main>
<?php $this->load->view('front/header/footer');  ?>