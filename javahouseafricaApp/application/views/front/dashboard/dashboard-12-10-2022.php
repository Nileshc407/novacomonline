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
?>
<header>
	<div class="container">
		<div class="row">
			<div class="col-12" style="height: 22px;">
			<!--<img style="height: 44px;" src="<?php echo base_url(); ?>assets/img/default-black-top.png">-->
			</div>
			<div class="col-12 d-flex justify-content-between align-items-center hedMain">
			
				<div class="leftRight"><button id="sidebarCollapse"><img src="<?php echo base_url(); ?>assets/img/menu.svg"></button></div>
				<div><img src="<?php echo base_url(); ?>assets/img/java-group-icon.svg"></div>
				<?php if($Member_based_earning_flag == 1) { ?>
				<div class="leftRight"><!--<button onclick="location.href = '<?php echo base_url(); ?>index.php/Cust_home/Claim_points';"><img src="<?php echo base_url(); ?>assets/img/points-history-icon.svg"></button><h1 style="width:104px; position: absolute; right: -2%;font-size: 14px;">Earn Points</h1>--></div>
				<?php } else { ?>
				<div class="leftRight"><!--<button onclick="location.href = '<?php echo base_url(); ?>index.php/Cust_home/Generate_code';"><img src="<?php echo base_url(); ?>assets/img/points-history-icon.svg"></button><h1 style="width:104px; position: absolute; right: -2%;font-size: 14px;">Earn Points</h1>--></div>
				<?php } ?>
			</div>
		</div>
	</div>
</header>
<main class="padTop padBottom" style="padding-bottom: 3%;">
	<div class="container">
		<div class="row">
			<div class="col-12 d-flex userNamePoint align-items-center">
				<div class="mr-auto"><h1>Hello, <?php echo ucwords($Enroll_details->First_name); ?></h1></div>
				<div class="pointMain"><?php echo $Company_Details->Currency_name; ?> </div>
			</div>
			<div class="col-12 d-flex userNamePoint align-items-center">
				<div class="mr-auto">&nbsp;</div>
				<div class="pointMain"><img src="<?php echo base_url(); ?>assets/img/home-point-start.svg"> <?php echo $Current_point_balance; ?></div>
			</div>
			<div class="col-12 d-flex userNamePoint align-items-center pt-2">
				<div class="userSubTxt mr-auto"></div>
				<div class="pointMain"><?php echo $Currency_Symbol; ?> <?php echo number_format($Current_point_balance / $Company_Details->Redemptionratio,0); ?></div>
			</div>
		</div>
	</div>
</main>
<main class="padTop padBottom" style="padding-top: 3%;padding-bottom: 3%;">
	<div class="container">
		<div class="row">
            <div class="col-12 pointMainWrapper">
                
                <ul class="pointMenu">
				<?php if($Member_based_earning_flag == 1) { ?>
					<li>
                        <a href="<?php echo base_url().'index.php/Cust_home/Claim_points'; ?>" class="cf w-100">
                            <div class="cardMain d-flex align-items-center">
                                <div class="icon"><img src="<?php echo base_url(); ?>assets/img/points-history-icon.svg"></div>
                                <div class="titleTxtMain">
									<h2>Earn Points</h2>
								</div>
                                <div class="rightIcon ml-auto"><img src="<?php echo base_url(); ?>assets/img/right-icon.svg"></div>
                            </div>
                        </a>
                    </li>
					<?php } else { ?> 
					<li>
                        <a href="<?php echo base_url().'index.php/Cust_home/Generate_code?flag=1'; ?>" class="cf w-100">
                            <div class="cardMain d-flex align-items-center">
                                <div class="icon"><img src="<?php echo base_url(); ?>assets/img/points-history-icon.svg"></div>
                                <div class="titleTxtMain">
									<h2>Earn Points</h2>
								</div>
                                <div class="rightIcon ml-auto"><img src="<?php echo base_url(); ?>assets/img/right-icon.svg"></div>
                            </div>
                        </a>
                    </li>
					
					<?php } ?>
					<li>
                        <a href="<?php echo base_url().'index.php/Cust_home/Generate_code?flag=2'; ?>" class="cf w-100">
                            <div class="cardMain d-flex align-items-center">
                                <div class="icon"><img src="<?php echo base_url(); ?>assets/img/points-history-icon.svg"></div>
                                <div class="titleTxtMain">
									<h2>Redeem Points</h2>
								</div>
                                <div class="rightIcon ml-auto"><img src="<?php echo base_url(); ?>assets/img/right-icon.svg"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url().'index.php/Cust_home/Points_history'; ?>" class="cf w-100">
                            <div class="cardMain d-flex align-items-center">
                                <div class="icon"><img src="<?php echo base_url(); ?>assets/img/points-history-icon.svg"></div>
                                <div class="titleTxtMain">
									<h2>My Points History</h2>
								</div>
                                <div class="rightIcon ml-auto"><img src="<?php echo base_url(); ?>assets/img/right-icon.svg"></div>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
		</div>
	</div>
</main>
<main class="padTop padBottom" style="padding-top:0;padding-bottom: 30%;">
	<div class="container">
		<div class="container">
			<div class="row">				
				<div class="col-12 d-flex justify-content-between align-items-center hedMain">				
					<div class="leftRight"></div>
					<div><h1 style="color: #DB1E34;font-size: 18px;font-weight: bold;">Offers This Month</h1><br></div>
					<div class="leftRight">&nbsp;</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-12 specialOfferWrapper">
				<ul class="offerHldr">
					<?php if($BrandImages) { ?> 
						<?php foreach ($BrandImages as $key => $value) { 
						
						?>
						
							<li>								
								<img src="<?php echo $value['Spl_Image']; ?>"/>
							</li>
								
						<?php  }  ?>
						<?php } else { ?>
															
								<p class="text-center"> No Special Offers
								</p>
							
						<?Php } ?>
                </ul>
			</div>
		</div>
	</div>
</main>	
<?php $this->load->view('front/header/footer');  ?>