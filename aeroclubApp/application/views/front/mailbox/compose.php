<?php  $this->load->view('front/header/header');  
//$this->load->view('front/header/menu');
  ?>
<!--<header>
	<div class="container">
		<div class="row">
			<div class="col-12" style="height: 22px;"></div>
			<div class="col-12 d-flex justify-content-between align-items-center hedMain">
				<div class="leftRight"><button onclick="location.href = '<?php echo base_url();?>index.php/Cust_home/mailbox';" ><img src="<?php echo base_url(); ?>assets/img/back-icon.svg"></button></div>
				<div><h1><?php echo $Notifications->Offer; ?></h1></div>
				<div class="leftRight">&nbsp;</div>
			</div>
		</div>
	</div>
</header>

<main class="padTop padBottom">
	<?php //echo $Notifications->Offer_description; ?>
</main>


-->
   <!-- <header>
        <div class="container">
            <div class="row">
                <div class="col-12"><img style="height: 44px;" src="<?php echo base_url(); ?>assets/img/default-white-top.png"></div>
              <div class="col-12 d-flex justify-content-between align-items-center hedMain">
                    <div class="leftRight"><button><img src="img/back-icon.svg"></button></div>
                    <div><h1>The Club</h1></div>
                    <div class="leftRight">&nbsp;</div>
                </div> 
            </div>
        </div>
    </header>
	-->




<main style="padding-bottom: 100px;" class="commonRoundWrapper">

    <div style="position: relative;padding: 0 15px;height: 170px;background-color: #2F296D;color: #fff;">
        <div style="display: flex !important;flex-direction: column !important;">
            <div style="padding-bottom: 15px;"><a href="<?php echo base_url(); ?>index.php/Cust_home/mailbox"><img src="<?php echo base_url(); ?>assets/img/back-icon.svg"></a></div>
            <h2 style="font-size: 18px;color: #fff;font-weight: 600;"><?php echo $Notifications->Offer; ?></h2>
        </div>
    </div>

    <div class="BoxHldr" style="position: relative;background-color: #fff;height: auto;border-radius: 50px 50px 0px 0px;margin-top: -60px;padding-top: 50px;">
        <?php echo $Notifications->Offer_description; ?>
    </div>
</main>
<?php $this->load->view('front/header/footer'); ?>