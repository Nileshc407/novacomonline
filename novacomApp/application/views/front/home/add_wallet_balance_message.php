<?php $this->load->view('front/header/header'); ?>
<body style="background-image:url('<?php echo base_url(); ?>assets/img/notification-bg.jpg')">
	<div id="wrapper">
		<div class="custom-header">
			<div class="container">
				<div class="heading-wrap">
					<div class="icon back-icon">
						<a href="<?php echo base_url(); ?>index.php/Cust_home/front_home"></a>
					</div>
					<h2>Confirmation</h2>
				</div>
			</div>
		</div>
		<div class="custom-body msg-box-body">
			<div class="msg-box confirmation">
				<a href="<?php echo base_url(); ?>index.php/Cust_home/front_home" class="close-icon"></a>
				<div class="confirm-icon text-center">
					<img src="<?php echo base_url(); ?>assets/img/confirm.png" class="img-fluid w-80">
					<p>Thanks for your Balance Added!</p>
				</div>
				
				<div class="text">
					<p><span class="value">Bill No :</span> <?php echo $Bill_no; ?> </p>
					<p><span class="value">Amount :</span> <?php echo $Symbol_of_currency.' '.$Paid_amount; ?> </p>
					<p><span class="value">Current Wallet Balance :</span> <?php echo $Symbol_of_currency.' '.$Wallet_balance; ?> </p>
					
				</div>
			</div>
		</div>
<?php $this->load->view('front/header/footer'); ?>