<?php 
$this->load->view('front/header/header'); 
$this->load->view('front/header/menu'); 
  
$Current_point_balance = ($Enroll_details->Total_balance-$Enroll_details->Debit_points);
	$Total_topup_amt=$Enroll_details->Total_topup_amt;
	if($Current_point_balance<0){
		$Current_point_balance=0;
	}else{
		$Current_point_balance=$Current_point_balance;
	}
	$Card_id = $Enroll_details->Card_id;
?>
<main class="padTop1 padBottom">
	<div class="nameMain topBg">
		<div class="nameHldr d-flex align-items-center">
			<div class="d-flex flex-column">
				Hello,
				<span><?php echo ucwords($Enroll_details->First_name); ?></span>
			</div>
			<div class="ml-auto"><button id="sidebarCollapse"><img src="<?php echo base_url(); ?>assets/img/menu.svg"></button></div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-12 accountBalanceWrapper">
				<div class="CurrBalance">
					<div class="d-flex align-items-center mb-3">
						<div class="BalanceIcon"><img src="<?php echo base_url(); ?>assets/img/splash-logo-round.svg"></div>
						<div class="BalanceTxt">
							<h2><span class="txt1">Account Balance </span></h2>
							<h2><span class="txt2"><?php echo $Company_Details->Currency_name; ?></span> <?php echo $Current_point_balance; ?></h2>
						</div>
					</div>
					<a href="<?php echo base_url(); ?>index.php/Cust_home/Generate_redeem_code" class="RedeemBtn text-center"> <img class="mr-2" src="<?php echo base_url(); ?>assets/img/qrcode-scan-icon.svg"> Pay</a>
					<br><br>
					<a href="<?php echo base_url(); ?>index.php/Cust_home/AddBalance" class="RedeemBtn text-center"> Add Balance</a>
				</div>
			</div>
			<div class="col-12 offerWrapper">
				<div class="boxHldr">
					<div class="homeOfferSlide">
						<!--<div><img src="<?php //echo base_url(); ?>assets/img/offer1.jpg"></div>
						<div><img src="<?php //echo base_url(); ?>assets/img/offer1.jpg"></div>-->
						<?php if($BrandImages) { ?> 
						<?php foreach ($BrandImages as $key => $value) { ?>
							<div><img src="<?php echo $value['Spl_Image']; ?>" alt=" " style="height:200px"></div>
						<?php  } 
							} ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
<?php $this->load->view('front/header/footer');  ?>
<style>
.accountBalanceWrapper .CurrBalance .BalanceTxt h2 .txt1 {
    font-size: 22px;
    font-weight: 400;
    color: #000;
}
.accountBalanceWrapper .CurrBalance .BalanceTxt h2 .txt2 {
    font-size: 22px;
    font-weight: 400;
    color: #000;
}
.RedeemBtn
{
	width: 60% !important;
}
.padTop1
{
	padding-top: 0px !important;
}
</style>