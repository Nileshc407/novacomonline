<?php 
$this->load->view('front/header/header'); 
$this->load->view('front/header/menu');   

$Current_point_balance = ($Enroll_details->Total_balance-$Enroll_details->Debit_points);
if($Current_point_balance<0){
	$Current_point_balance=0;
}else{
	$Current_point_balance=$Current_point_balance;
}
?>
<header>
	<div class="container">
		<div class="row">
			<div class="col-12" style="height: 22px;">
			<!--<img style="height: 44px;" src="<?php echo base_url(); ?>assets/img/default-black-top.png">-->
			</div>
			<div class="col-12 d-flex justify-content-between align-items-center hedMain">
				<div class="leftRight"><button id="sidebarCollapse"><img src="<?php echo base_url(); ?>assets/img/menu.svg"></button></div>
			</div>
		</div>
	</div>
</header>
<main class="padTop padBottom">
	<div class="container">
		<div class="row">
			<div class="col-12 d-flex userNamePoint align-items-center">
				<div class="mr-auto"><h1>Hello, <?php echo ucwords($Enroll_details->First_name); ?></h1></div>
				<div class="pointMain"><?php echo $Company_Details->Currency_name; ?> </div>
			</div>
			<div class="col-12 d-flex userNamePoint align-items-center">
				<div class="mr-auto">&nbsp;</div>
				<div class="pointMain"><img src="<?php echo base_url(); ?>assets/img/home-point-start.svg"> <span id="Points_balance"> <?php echo $Current_point_balance; ?></span></div>
			</div>
			<div class="col-12 d-flex userNamePoint align-items-center pt-2">
				<div class="userSubTxt mr-auto"></div>
				<div class="pointMain"><?php echo $Currency_Symbol; ?> <span id="Points_value"> <?php echo number_format($Current_point_balance / $Company_Details->Redemptionratio,0); ?></span></div>
			</div>
		</div>
	</div>
	<section class="homeSlider">
		<div class="homeSlide">
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
		<div class="row">
			<div class="col-12 homeTxt">
				<p>Nomad Beach Bar brings together great food, entertainment and service and surrounds them with stunning views. Overlooking one of Africa’s top beaches, Nomad Beach Bar is available for Breakfast, Lunch & Dinner and regularly hosts special events in Diani Beach.</p>
				<p>Also home to one of Kenya’s premier fine dining establishments, Indulge Fine Dining, Nomad is the perfect destination for any occasion.</p>
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