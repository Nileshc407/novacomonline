<?php $this->load->view('front/header/header'); 

$Current_point_balance = ($Enroll_details->Total_balance-$Enroll_details->Debit_points);		
if($Current_point_balance<0)
{
	$Current_point_balance=0;
}
else
{
	$Current_point_balance=$Current_point_balance;
}
?>
<main class="qrCodeWrapper">
<div class="container">
	<div class="row">
		<div class="col-12">
			<div class="closeBtn"><a href="<?php echo base_url(); ?>index.php/Cust_home/transferpointsApp"><img src="<?php echo base_url(); ?>assets/img/close-icon1.svg"></a></div>
			<div class="qrCodeHldr">
				<div class="logoMain"><img src="<?php echo base_url(); ?>assets/img/logo.png"></div>
				<h2><?php echo ucwords($Enroll_details->First_name); ?></h2>
				<div class="pointMain"><?php echo $Current_point_balance.' '.$Company_Details->Currency_name; ?></div>
				<div class="qrCodeMain flex-column">
					<div class="sucessfully"><?php echo $Success_Message; ?></div>
					<div class="codeMain"></div>
                    <div class="expiresMain"></div>
				</div>
			</div>
		</div>
	</div>
</div>
</main>
<?php $this->load->view('front/header/footer'); ?>		