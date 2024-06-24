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
$Photograph = $Enroll_details->Photograph;
if($Photograph=="")
{
	$Photograph=base_url()."assets/images/profile.jpg";
} else {
	$Photograph=$this->config->item('base_url2').$Photograph;
}
?> 
	<!--<header>
        <div class="container">
            <div class="row">
                 <div class="col-12 d-flex justify-content-between align-items-center hedMain">
                    <div class="leftRight"><button onclick="location.href = '<?php echo base_url(); ?>index.php/Cust_home/front_home';"><img src="<?php echo base_url(); ?>assets/img/back-icon.svg"></button></div>
                    <div><h1>Terms & Conditions</h1></div>
                    <div class="leftRight">&nbsp;</div>
                </div>
            </div>
        </div>
    </header>-->

	<main class="padTop1 padBottom commonRoundWrapper">
    <div class="hedMainHldr">
        <div class="d-flex flex-column">
            <div class="pb-3"><a href="<?php echo base_url(); ?>index.php/Cust_home/more"><img src="<?php echo base_url(); ?>assets/img/back-icon.svg"></a></div>
            <h2>Terms & Conditions</h2>
        </div>
    </div>
    <div class="BoxHldr">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                </div>
            </div>
        </div>
    </div>
</main>
<?php $this->load->view('front/header/footer');  ?>		