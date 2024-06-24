<?php 
$this->load->view('front/header/header'); 
$this->load->view('front/header/menu'); 

$Current_point_balance = ($Enroll_details->Total_balance-$Enroll_details->Debit_points);		
if($Current_point_balance<0)
{
	$Current_point_balance=0;
}
else
{
	$Current_point_balance=$Current_point_balance;
}	
$Photograph = $Enroll_details->Photograph;
// echo"<br>----Photograph----".$Photograph;
if($Photograph=="")
{
	$Photograph=base_url()."assets/images/profile.jpg";
} else {
	$Photograph=$this->config->item('base_url2').$Photograph;
}	
$Wallet_balance = $Enroll_details->Wallet_balance;
$Wallet_flag = $Company_Details->Enable_wallet_flag;
if($Wallet_flag == 1)
{
	$Account_balance = $Wallet_balance;
}
else
{
	$Account_balance = $Current_point_balance;
}
?>
<header>
	<div class="container">
		<div class="row">
			<!--<div class="col-12"><img style="height: 44px;" src="<?php echo base_url(); ?>assets/img/default-white-top.png"></div>-->
			<div class="col-12 d-flex justify-content-between align-items-center hedMain">
				<div class="leftRight"><button onclick="location.href = '<?php echo base_url();?>index.php/Cust_home/front_home';"><img src="<?php echo base_url(); ?>assets/img/back-icon.svg"></button></div>
				<div><h1><?php echo $Enroll_details->First_name.' '.$Enroll_details->Last_name; ?></h1></div>
				<div class="leftRight"><div class="ml-auto"><button id="sidebarCollapse"><img src="<?php echo base_url(); ?>assets/img/menu.svg"></button></div></div>
				
			</div>
		</div>
	</div>
</header>
<body class="bodyBg">
<main class="padTop profileWrapper">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="CurrBalance">
                    <div class="d-flex align-items-center mb-3">
						<div class="BalanceIcon"><img src="<?php echo base_url(); ?>assets/img/splash-logo-round.svg"></div>
						<div class="BalanceTxt">
							<h2><span class="txt1">Account Balance </span></h2>
							<h2><span class="txt2">KES</span> <?php echo $Account_balance; ?></h2>
						</div>
					</div>
                    <!--<a href="<?php echo base_url();?>index.php/Cust_home/AddBalance" class="MainBtn w-100 text-center" onclick="ClearlocalStorage();">Add Balance</a>-->
                </div>
            </div>

        </div>
    </div>
    
    <div class="BoxHldr profileWrapper">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ul class="profileLink">
                        <li>
                            <a class="w-100" href="<?php echo base_url();?>index.php/Cust_home/profile">
                                <div class="d-flex align-items-center">
                                    <div class="mr-2"><img src="<?php echo base_url(); ?>assets/img/personal-details-icon.svg"></div>
                                    <div class="titleTxtMain">Personal Details</div>
                                    <div class="rightIcon ml-auto">
                                        <img src="<?php echo base_url(); ?>assets/img/right-icon.svg">
                                    </div>
                                </div>
                            </a>
                        </li>
						<?php if($Wallet_flag == 1) { ?>
						 <li>
                            <a class="w-100" href="<?php echo base_url();?>index.php/Cust_home/AddWalletBalance">
                                <div class="d-flex align-items-center">
                                    <div class="mr-2"><img src="<?php echo base_url(); ?>assets/img/transactions-icon.svg"></div>
                                    <div class="titleTxtMain">Add Account Balance</div>
                                    <div class="rightIcon ml-auto">
                                        <img src="<?php echo base_url(); ?>assets/img/right-icon.svg">
                                    </div>
                                </div>
                            </a>
                        </li>
						<?php } ?>
                        <li>
                            <a class="w-100" href="<?php echo base_url();?>index.php/Cust_home/transactions">
                                <div class="d-flex align-items-center">
                                    <div class="mr-2"><img src="<?php echo base_url(); ?>assets/img/transactions-icon.svg"></div>
                                    <div class="titleTxtMain">Transactions</div>
                                    <div class="rightIcon ml-auto">
                                        <img src="<?php echo base_url(); ?>assets/img/right-icon.svg">
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</main>
<?php $this->load->view('front/header/footer');  ?>
<script>
	function ClearlocalStorage()
	{
		localStorage.clear();
	}
</script>
<style>
 .CurrBalance .BalanceTxt h2 .txt1 {
    font-size: 22px;
    font-weight: 400;
    color: #000;
}
.CurrBalance .BalanceTxt h2 .txt2 {
    font-size: 22px;
    font-weight: 400;
    color: #000;
}
</style>