<?php $this->load->view('front/header/header'); ?>
<main class="qrCodeWrapper">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="closeBtn"><a href="<?php echo base_url(); ?>index.php/Cust_home/Buy_gift_card"><img src="<?php echo base_url(); ?>assets/img/close-icon1.svg"></a></div>
				<div class="qrCodeHldr">
					<div class="logoMain"><img src="<?php echo base_url(); ?>assets/img/logo.png"></div>
					<div class="qrCodeMain flex-column">
						<div class="sucessfully"><?php echo $error_code; ?></div>
						<?php if($error_flag == 0) { ?>
						<div class="codeMain">Gift Card No : <?php echo $gift_cardid; ?> </div>
						<div class="expiresMain">Amount : <?php echo $Symbol_of_currency.' '.$gift_amt; ?></div>	
						<div class="expiresMain">Valid Till : <?php echo $Valid_till; ?> </div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
<?php $this->load->view('front/header/footer'); ?>
<style>
.qrCodeHldr .qrCodeMain .codeMain,.expiresMain {
    font-size: 13px !important;
    padding-bottom: 15px !important;
    font-family: gothambold  !important;
    line-height: 26px !important; 
    color: #e82025 !important;
}
</style>