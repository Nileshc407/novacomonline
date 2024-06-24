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

if($Photograph=="")
{
	$Photograph=base_url()."assets/images/profile.jpg";
} else {
	$Photograph=$this->config->item('base_url2').$Photograph;
}	
?>
<header>
	<div class="container">
		<div class="row">
			<div class="col-12" style="height: 44px;"></div>
			<div class="col-12 d-flex justify-content-between align-items-center hedMain">
				<div class="leftRight"><button onclick="location.href = '<?php echo base_url().'index.php/Cust_home/front_home'; ?>';"><img src="<?php echo base_url(); ?>assets/img/back-icon.svg"></button></div>
				<div><h1>Profile</h1></div>
				<div class="leftRight">&nbsp;</div>
			</div>
		</div>
	</div>
</header>	
<main class="padTop2 profileWrapper">    
    <div class="BoxHldr">
        <div class="nameMain topBg">
            <div class="nameHldr">Hello, <span><?php echo ucwords($Enroll_details->First_name); ?></span></div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="CurrBalance">
                        <div class="text-center m-3">
                            <div class="BalanceTxt">
                                <h2><?php echo $Current_point_balance; ?></h2>
                                <span class="txt"><?php echo $Company_Details->Currency_name; ?></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12" style="height: 500px; overflow-y: scroll;">
                    <ul class="profileLink">
                        <li>
                            <a class="w-100" href="<?php echo base_url();?>index.php/Cust_home/profile">
                                <div class="d-flex align-items-center">
                                    <div class="mr-3"><img src="<?php echo base_url(); ?>assets/img/icons/profile-icon.svg"></div>
                                    <div class="titleTxtMain">Profile</div>
                                    <div class="rightIcon ml-auto">
                                        <img src="<?php echo base_url(); ?>assets/img/right-icon.svg">
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a class="w-100" href="<?php echo base_url();?>index.php/Cust_home/transactions">
                                <div class="d-flex align-items-center">
                                    <div class="mr-3"><img src="<?php echo base_url(); ?>assets/img/icons/faqs-icon.svg"></div>
                                    <div class="titleTxtMain">Transactions</div>
                                    <div class="rightIcon ml-auto">
                                        <img src="<?php echo base_url(); ?>assets/img/right-icon.svg">
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a class="w-100" href="<?php echo base_url();?>index.php/Cust_home/terms_conditions">
                                <div class="d-flex align-items-center">
                                    <div class="mr-3"><img src="<?php echo base_url(); ?>assets/img/icons/terms-conditions-icon.svg"></div>
                                    <div class="titleTxtMain">Terms & Conditions</div>
                                    <div class="rightIcon ml-auto">
                                        <img src="<?php echo base_url(); ?>assets/img/right-icon.svg">
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a class="w-100" href="<?php echo base_url();?>index.php/Cust_home/privacy_policy">
                                <div class="d-flex align-items-center">
                                    <div class="mr-3"><img src="<?php echo base_url(); ?>assets/img/icons/privacy-policy-icon.svg"></div>
                                    <div class="titleTxtMain">Privacy Policy</div>
                                    <div class="rightIcon ml-auto">
                                        <img src="<?php echo base_url(); ?>assets/img/right-icon.svg">
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a class="w-100" href="<?php echo base_url();?>index.php/Cust_home/signout">
                                <div class="d-flex align-items-center">
                                    <div class="mr-3"><img src="<?php echo base_url(); ?>assets/img/icons/signout-icon.svg"></div>
                                    <div class="titleTxtMain">Signout</div>
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