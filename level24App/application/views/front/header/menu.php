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
		<li><a href="<?php echo base_url(); ?>index.php/Cust_home/member_benefits"><i><img src="<?php echo base_url(); ?>assets/img/member-benefits-icon.svg"></i> Member Benefits</a></li>
		<li><a href="<?php echo base_url(); ?>index.php/Cust_home/special_offer"><i><img src="<?php echo base_url(); ?>assets/img/offer-icon.svg"></i> Special Offers</a></li>
		<li><a href="<?php echo base_url(); ?>index.php/Cust_home/works"><i><img src="<?php echo base_url(); ?>assets/img/how-works-icon.svg"></i> How it works</a></li>
		<li><a href="<?php echo base_url(); ?>index.php/Cust_home/settings"><i><img src="<?php echo base_url(); ?>assets/img/settings-icon.svg"></i> Settings</a></li>
		<li><a href="<?php echo base_url(); ?>index.php/Cust_home/contactus"><i><img src="<?php echo base_url(); ?>assets/img/contact-us-icon.svg"></i> Contact Us</a></li>
	</ul>
</nav>
<nav id="sidebar">
	<div id="dismiss">&nbsp;</div>

	<div class="sidebar-header d-flex align-items-center">
		<div class="userImg"><img src="img/user.jpg"></div>
		<h3>John</h3>
	</div>

	<ul class="list-unstyled">
		<li><a href="member-benefits.html"><i><img src="img/member-benefits-icon.svg"></i> Member Benefits</a></li>
		<li><a href="special-offers.html"><i><img src="img/offer-icon.svg"></i> Special Offers</a></li>
		<li><a href="how-work.html"><i><img src="img/how-works-icon.svg"></i> How it works</a></li>
		<li><a href="setting.html"><i><img src="img/settings-icon.svg"></i> Settings</a></li>
		<li><a href="contact.html"><i><img src="img/contact-us-icon.svg"></i> Contact Us</a></li>
	</ul>
</nav>