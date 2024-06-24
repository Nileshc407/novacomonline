<?php 
$this->load->view('front/header/header'); 
$this->load->view('front/header/menu');   
$Current_point_balance = ($Enroll_details->Total_balance-$Enroll_details->Debit_points);
?>
<main class="qrCodeWrapper">
	<div class="container">
		<div class="row">
			<div class="col-12">
                <div class="closeBtn"><a href="<?php echo base_url().'index.php/Cust_home/front_home'; ?>"><img src="<?php echo base_url(); ?>assets/img/close-icon1.svg"></a></div>
                <div class="qrCodeHldr">
                    <div class="logoMain"><img src="<?php echo base_url(); ?>assets/img/java-group-icon.svg"></div>
                    <h2><?php echo ($Enroll_details->First_name.' '.$Enroll_details->Last_name); ?></h2>
                    <div class="pointMain"><?php echo $Current_point_balance; ?> <span class="txt"><?php echo $Currency_name; ?></div>
                    <div class="qrCodeMain flex-column">
					<form class="perDetailForm" id="Generate_code" method="post" action="<?php echo base_url();?>index.php/Cust_home/update_fcm_token">
						<div class="form-group">
							<label class="font-weight-bold">Token</label>
							<input type="text" class="form-control" name="token" id="token"  placeholder="Enter token" required>
						</div>
							<div class="sucessfully"></div>
							<div class="Redeem_msg" style="float: center;"></div><br/>
							<button type="submit" name="submit" class="redBtn w-100 text-center">Update</button>
						</div>
					</form>
                </div>
			</div>
		</div>
	</div>
</main>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
