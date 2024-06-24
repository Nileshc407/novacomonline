<?php 
$this->load->view('front/header/header'); 
$this->load->view('front/header/menu');   
$Current_point_balance = ($Enroll_details->Total_balance-$Enroll_details->Debit_points);
?>
<main class="qrCodeWrapper">
	<div class="container">
		<div class="row">
			<div class="col-12">
                <div class="closeBtn"><a href="<?php echo base_url().'index.php/Cust_home/redeem_history'; ?>"><img src="<?php echo base_url(); ?>assets/img/close-icon1.svg"></a></div>
                <div class="qrCodeHldr">
                    <div class="logoMain"><img src="<?php echo base_url(); ?>assets/img/logo.png"></div>
                    <!--<h2><?php //echo ($Enroll_details->First_name.' '.$Enroll_details->Last_name); ?></h2>-->
                    <div class="pointMain"><?php echo $Current_point_balance; ?> <span class="txt"><?php echo $Currency_name; ?></div>
                    <div class="qrCodeMain flex-column">
                        <div class="sucessfully"><?php echo $Msg; ?></div>
                        <div class="codeMain"><?php echo $pin; ?></div>
                        <div class="expiresMain">Expires in <?php echo $pin_valid_till; ?> minutes</div>
                    </div>
                </div>
			</div>
		</div>
	</div>
</main>