<?php 
$this->load->view('front/header/header'); 
$this->load->view('front/header/menu');   
$Current_point_balance = ($Enroll_details->Total_balance-$Enroll_details->Debit_points);
?>
<header>
	<div class="container">
		<div class="row">
			<div class="col-12" style="height: 22px;"></div>
			<div class="col-12 d-flex justify-content-between align-items-center hedMain">
				<div class="leftRight"><button id="sidebarCollapse"><img src="<?php echo base_url(); ?>assets/img/menu.svg"></button></div>
			</div>
		</div>
	</div>
</header> 
<main class="padTop padBottom">
	<div class="container">
		<div class="row">
            <div class="col-12 pointMainWrapper">
                <div class="CurrPoints">
                    <div class="d-flex align-items-center mb-3">
                        <div class="pointIcon"><img src="<?php echo base_url(); ?>assets/img/point-icon.svg"></div>
                        <div class="pointTxt">
                            <h2><?php echo $Current_point_balance; ?> <span class="txt"><?php echo $Currency_name; ?></span></h2>
                            <h2><span class="txt"><?php echo $Symbol_of_currency; ?></span> <?php echo ($Current_point_balance*$Redemptionratio); ?> </h2>
                        </div>
                    </div>
                    <a href="<?php echo base_url().'index.php/Cust_home/Generate_code?flag=1'; ?>" class="whiteBtn w-100 text-center">Earn points</a> <br><br>
					<a href="<?php echo base_url().'index.php/Cust_home/Generate_redeem_code'; ?>" class="whiteBtn w-100 text-center">Redeem points</a>
                </div>
                <ul class="pointMenu">
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
					<li>
                        <a href="<?php echo base_url().'index.php/Cust_home/My_vouchers'; ?>" class="cf w-100">
                            <div class="cardMain d-flex align-items-center">
                                <div class="icon"><img src="<?php echo base_url(); ?>assets/img/vouchers-icon.svg"></div>
                                <div class="titleTxtMain">
									<h2>My Vouchers</h2>
								</div>
                                <div class="rightIcon ml-auto"><img src="<?php echo base_url(); ?>assets/img/right-icon.svg"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url().'index.php/Cust_home/Buy_gift_card'; ?>" class="cf w-100">
                            <div class="cardMain d-flex align-items-center">
                                <div class="icon"><img src="<?php echo base_url(); ?>assets/img/giftcard-icon.svg"></div>
                                <div class="titleTxtMain">
									<h2>Gift Cards</h2>
								</div>
                                <div class="rightIcon ml-auto"><img src="<?php echo base_url(); ?>assets/img/right-icon.svg"></div>
                            </div>
                        </a>
                    </li>
					<li>
                        <a href="<?php echo base_url().'index.php/Cust_home/stamp_collection'; ?>" class="cf w-100">
                            <div class="cardMain d-flex align-items-center">
                                <div class="icon"><img src="<?php echo base_url(); ?>assets/img/vouchers-icon.svg"></div>
                                <div class="titleTxtMain">
									<h2>Stamp Collections</h2>
								</div>
                                <div class="rightIcon ml-auto"><img src="<?php echo base_url(); ?>assets/img/right-icon.svg"></div>
                            </div>
                        </a>
                    </li>
					<li>
                        <a href="<?php echo base_url().'index.php/Cust_home/transferpointsApp'; ?>" class="cf w-100">
                            <div class="cardMain d-flex align-items-center">
                                <div class="icon"><img src="<?php echo base_url(); ?>assets/img/points-history-icon.svg"></div>
                                <div class="titleTxtMain">
									<h2>Transfer Points</h2>
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
<?php $this->load->view('front/header/footer');  ?>