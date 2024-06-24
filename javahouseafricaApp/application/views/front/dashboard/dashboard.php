<?php 
// $secondsWait = 10;
// header("Refresh:$secondsWait");
$this->load->view('front/header/header'); 
$this->load->view('front/header/menu');   

$Current_point_balance = ($Enroll_details->Total_balance-$Enroll_details->Debit_points);
if($Current_point_balance<0){
	$Current_point_balance=0;
}else{
	$Current_point_balance=$Current_point_balance;
}
	
$Member_based_earning_flag = $Company_Details->Member_based_earning_flag;
$Member_based_redeem_flag = $Company_Details->Member_based_redeem_flag;
?>
<header>
	<div class="container">
		<div class="row">
			<div class="col-12" style="height: 44px;"></div>
		</div>
	</div>
</header>
<main class="padTop1 padBottom">
	<div class="nameMain topBg">
		<div class="pointHldr d-flex align-items-center">
			<a href="<?php echo base_url().'index.php/Cust_home/myprofile'; ?>" class="nameIcon">
			<?php echo substr($Enroll_details->First_name, 0, 2); ?>
			</a>
			<div class="pointWrapper">
				<div class="name">Hi, <span class="point"><?php echo ucwords($Enroll_details->First_name); ?></span></div>
				<div class="pointMain"><?php echo $Company_Details->Currency_name; ?> <span class="point" id=
				"Points_balance"><?php echo $Current_point_balance; ?></span></div>
				<div class="kes"><?php echo $Currency_Symbol; ?> <span id="Points_value"><?php echo number_format($Current_point_balance / $Company_Details->Redemptionratio,0); ?></span></div>
			</div>
			<div class="d-flex flex-column ml-auto">
				<ul class="topRightIcon">
					<li><a href="<?php echo base_url().'index.php/Cust_home/contactus'; ?>"><img src="<?php echo base_url(); ?>assets/img/icons/call.svg"></a></li>
					<li><a href="#"><img src="<?php echo base_url(); ?>assets/img/icons/wallet.svg"></a></li>
					<li><a href="<?php echo base_url().'index.php/Cust_home/mailbox'; ?>"><img src="<?php echo base_url(); ?>assets/img/icons/notification.svg"></a></li>
					<li><a href="<?php echo base_url().'index.php/Cust_home/qrsacn'; ?>"><img src="<?php echo base_url(); ?>assets/img/icons/scan.svg"></a></li>
					<li><a href="#"><img src="<?php echo base_url(); ?>assets/img/icons/logo-icon.svg"></a></li>
				</ul>
			</div>
		</div>
	</div>

	<div class="socialIconsWrapper">
		<ul>
			<li><a href="https://www.instagram.com/javahouseafrica"><img src="<?php echo base_url(); ?>assets/img/icons/Instagram-logo.svg"></a></li>
			<li><a href="https://www.facebook.com/javahouseafrica"><img src="<?php echo base_url(); ?>assets/img/icons/facebook-icon.svg"></a></li>
			<li><a href="https://javahouseafrica.com"><img src="<?php echo base_url(); ?>assets/img/icons/youtube-icon.svg"></a></li>
			<li><a href="https://twitter.com/javahouseafrica"><img src="<?php echo base_url(); ?>assets/img/icons/Twitter-icon.svg"></a></li>
			<li><a href="https://javahouseafrica.com"><img src="<?php echo base_url(); ?>assets/img/icons/tiktok-icon.svg"></a></li>
			<li><a href="https://javahouseafrica.com"><img src="<?php echo base_url(); ?>assets/img/icons/web-icon.svg"></a></li>
		</ul>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-12 mb-4">
				<a class="w-100" href="<?php echo base_url(); ?>index.php/Cust_home/aboutus"><img class="w-100" src="<?php echo base_url(); ?>assets/img/feedback-img.png"></a>
			</div>
			<div class="col-12 mb-3">
				<ul class="homeServices">
					<li>
						<a href="<?php echo base_url().'index.php/Cust_home/Generate_code?flag=1'; ?>">
							<div class="Sicon"><img src="<?php echo base_url(); ?>assets/img/icons/earn-points.svg"></div>
							<div class="txt">Earn Points</div>
						</a>
					</li>
					<li>
						<a href="<?php echo base_url().'index.php/Cust_home/Points_history'; ?>">
							<div class="Sicon"><img src="<?php echo base_url(); ?>assets/img/icons/transactions.svg"></div>
							<div class="txt">Transactions</div>
						</a>
					</li>
					<li>
						<a href="<?php echo base_url().'index.php/Cust_home/Generate_redeem_code'; ?>">
							<div class="Sicon"><img src="<?php echo base_url(); ?>assets/img/icons/redeem-points.svg"></div>
							<div class="txt">Redeem Points</div>
						</a>
					</li>
				</ul>
			</div>

			<div class="col-12 mb-3">
				<ul class="homeServices">
					<li>
						<a href="https://javahouseafrica.com">
							<div class="Sicon"><img src="<?php echo base_url(); ?>assets/img/icons/our-loyalty.svg"></div>
							<div class="txt">Our Loyalty</div>
						</a>
					</li>
					<li>
						<a href="https://javahouseafrica.com">
							<div class="Sicon"><img src="<?php echo base_url(); ?>assets/img/icons/gift-vouchers.svg"></div>
							<div class="txt">Gift Vouchers</div>
						</a>
					</li>
					<li>
						<a href="https://javahouseafrica.com">
							<div class="Sicon"><img src="<?php echo base_url(); ?>assets/img/icons/java-pantry.svg"></div>
							<div class="txt">Java Pantry</div>
						</a>
					</li>
				</ul>
			</div>

			<div class="col-12 mb-3">
				<ul class="homeServices">
					<li>
						<a href="https://javahouseafrica.com">
							<div class="Sicon"><img src="<?php echo base_url(); ?>assets/img/icons/merchandise.svg"></div>
							<div class="txt">Merchandise</div>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-12 mb-4">
				<div class="homeSlide">
					<?php if($BrandImages) { ?> 
						<?php foreach ($BrandImages as $key => $value) { ?>
						<div class="item">
							<img src="<?php echo $value['Spl_Image']; ?>" alt=" ">
						</div>
					<?php  } 
						} ?>
				</div>
			</div>

			<div class="col-12">
				<a class="w-100" href="https://javahouseafrica.com"><img class="w-100" src="<?php echo base_url(); ?>assets/img/donate-img.png"></a>
			</div>
			<div class="col-12">
				<div class="homeOurBrands">
					<h2>Our Brands</h2>
					<ul class="brandHldr">
						<li><a href="https://javahouseafrica.com"><img src="<?php echo base_url(); ?>assets/img/java_logo.jpg"></a></li>
						<li><a href="https://javahouseafrica.com"><img src="<?php echo base_url(); ?>assets/img/foodscape-logo.jpg"></a></li>
						<li><a href="https://javahouseafrica.com"><img src="<?php echo base_url(); ?>assets/img/360-degrees_logo.jpg"></a></li>
						<li><a href="https://javahouseafrica.com"><img src="<?php echo base_url(); ?>assets/img/kukito-logo.jpg"></a></li>
						<li><a href="https://javahouseafrica.com"><img src="<?php echo base_url(); ?>assets/img/planetyogurt_logo.jpg"></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</main>
<?php $this->load->view('front/header/footer');  ?>
<script>
setInterval(function() {
	var Company_id = '<?php echo $Enroll_details->Company_id; ?>';
	var Enrollement_id = '<?php echo $Enroll_details->Enrollement_id; ?>';
	var Redemptionratio = '<?php echo $Company_Details->Redemptionratio; ?>';
	
	$.ajax({
		type: "POST",
		data: { Enrollement_id: Enrollement_id, Company_id:Company_id,Redemptionratio:Redemptionratio},
		url: "<?php echo base_url()?>index.php/Cust_home/fetch_current_balance",
		success: function(data)
		{
			if(data != 0)
			{
				json = eval("(" + data + ")");
				$('#Points_balance').html(json[0].Current_balance); 
				$('#Points_value').html(json[0].Points_value);
			}
		}
	});
}, 10000); 
</script>
<style>
.howWorkSliderHldr::before {
   z-index: 0 !important;
}
</style>