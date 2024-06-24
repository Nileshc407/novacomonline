<?php 
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
			<div class="col-12"></div>
			<div class="col-12 d-flex justify-content-between align-items-center hedMain">
				<div class="leftRight"><button id="sidebarCollapse"><img src="<?php echo base_url(); ?>assets/img/menu.svg"></button></div>
			</div>
		</div>
	</div>
</header>

<main class="padTop1 padBottom">
	<section class="homeSlider">
		<div class="homeSlide">
		<?php /* if($BrandImages) { ?> 
			<?php foreach ($BrandImages as $key => $value) { ?>
			<div class="item">
				<img src="<?php echo $value['Spl_Image']; ?>" alt=" ">
			</div>
			<?php  }  ?>
			<?php } else { ?>							
			<p class="text-center"> No Special Offers</p>
			<?Php } */ ?>
			<div class="item">
				<img src="<?php echo base_url(); ?>assets/img/home-slide1.jpg" alt=" ">
			</div>
			<div class="item">
				<img src="<?php echo base_url(); ?>assets/img/home-slide2.jpg" alt=" ">
			</div>
			<div class="item">
				<img src="<?php echo base_url(); ?>assets/img/home-slide3.jpg" alt=" ">
			</div>
		</div>
	</section>

	<div class="container">
		<div class="boxMain">
			<div class="row">
				<div class="col-12 userNamePoint text-center">
					<h1>Hello, <?php echo ucwords($Enroll_details->First_name); ?></h1>
				</div>
				<div class="col-12 userNamePoint text-center">
					<div class="mb-3">24  LEVEL</div>
					<div class="pointMain"><?php echo $Current_point_balance; ?></div>
				</div>
				<div class="col-12 userNamePoint">
					<div class="boxpoint"><?php echo $Currency_Symbol.' '.number_format($Current_point_balance / $Company_Details->Redemptionratio,0); ?></div>
				</div>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-12 homeTxt">
				<p>Welcome to our loyalty app for Level 24 Fitness and Eatery. 
Introduction summary - Our Loyalty app has been designed with the customer in mind. We have made sure that this app can be used both in our restaurant and gym. With every purchase you make, you will generate points, which in turn will generate discounts. Let’s start your journey!!</p>
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