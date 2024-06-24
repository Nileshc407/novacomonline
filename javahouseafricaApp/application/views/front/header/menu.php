<?php 
	$Photograph=$Enroll_details->Photograph;
	if($Photograph=="")
	{
		$Photograph=base_url()."assets/img/user.jpg";
	} else {
		
		$Photograph=$this->config->item('base_url2').$Photograph;
		
	}
?>
<nav id="sidebar">
	<div id="dismiss">&nbsp;</div>

	<div class="sidebar-header d-flex align-items-center">
		<div class="userImg"><img src="<?php echo $Photograph; ?>"></div>
		<h3><?php echo ucwords($Enroll_details->First_name); ?></h3>
	</div>

	<ul class="list-unstyled">
		<li><a href="<?php echo base_url(); ?>index.php/Cust_home/redeem_history"><i><img src="<?php echo base_url(); ?>assets/img/select-brand-icon.svg"></i> Our Story</a></li>
		<li><a href="<?php echo base_url(); ?>index.php/Cust_home/works"><i><img src="<?php echo base_url(); ?>assets/img/how-works-icon.svg"></i> Using the app</a></li>
		<li><a href="<?php echo base_url(); ?>index.php/Cust_home/settings"><i><img src="<?php echo base_url(); ?>assets/img/settings-icon.svg"></i> Settings</a></li>
		<li><a href="<?php echo base_url(); ?>index.php/Cust_home/contactus"><i><img src="<?php echo base_url(); ?>assets/img/contact-us-icon.svg"></i> Contact Us</a></li>
		<li><a href="<?php echo base_url(); ?>index.php/Cust_home/signout"><i><img src="<?php echo base_url(); ?>assets/img/settings-icon.svg"></i> Signout </a></li>
	</ul>
</nav>