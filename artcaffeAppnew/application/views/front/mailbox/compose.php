<?php $this->load->view('front/header/header'); ?>
<body style="background-image:url('<?php echo base_url(); ?>assets/img/statement-bg.jpg')">
	<div id="wrapper">
		<div class="custom-header">
			<div class="container">
				<div class="heading-wrap">
					<div class="icon back-icon">
						<a href="<?php echo base_url();?>index.php/Cust_home/mailbox"></a>
					</div>
					<h2>Notifications</h2>
				</div>
			</div>
		</div>
		<div class="custom-body">
			<div class="box purchuase-box">
				<?php echo $Notifications->Offer_description; ?>
			</div>
		</div>
	
<?php $this->load->view('front/header/footer'); ?>