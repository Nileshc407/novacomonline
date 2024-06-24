<?php $this->load->view('front/header/header'); ?>
<body>
 <header>
	<div class="container">
		<div class="row">
			<div class="col-12 d-flex justify-content-between align-items-center hedMain">
				<div class="leftRight"><button onclick="location.href = '<?php echo base_url();?>index.php/Cust_home/myprofile';"><img src="<?php echo base_url(); ?>assets/img/back-icon.svg"></button></div>
				<div><h1>Confirmation</h1></div>
				<div class="leftRight">&nbsp;</div>
			</div>
		</div>
	</div>
</header><br>
<main style="padding-bottom: 100px;padding-top: 44px;" class="commonRoundWrapper">
    <div class="BoxHldr" style="position: relative;background-color: #fff;height: auto;border-radius: 50px 50px 0px 0px;margin-top: -60px;padding-top: 50px;">
        <div style="width: 100%;padding-right: 15px;padding-left: 15px;">
            <div style="position: relative;margin: 0;padding: 0 10px;">
                <h2 style="font-size: 20px;padding-bottom: 15px;font-family: 'Poppins', sans-serif;margin: 0;color: #2F296D;font-weight: 700;">Thanks for your Balance Added!</h2>
               <p><span class="value">Bill No :</span> <?php echo $Bill_no; ?> </p>
					<p><span class="value">Amount :</span> <?php echo $Symbol_of_currency.' '.$Paid_amount; ?> </p>
					<p><span class="value">Current Wallet Balance :</span> <?php echo $Symbol_of_currency.' '.$Wallet_balance; ?> </p>
            </div>
			<div class="col-12"><a href="<?php echo base_url();?>index.php/Cust_home/myprofile" class="MainBtn w-100 text-center">OK</a></div>
        </div>
    </div>
</main>
<?php $this->load->view('front/header/footer'); ?>