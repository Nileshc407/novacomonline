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
		<a href="<?php echo base_url(); ?>index.php/Cust_home/profile"><h3><?php echo ucwords($Enroll_details->First_name); ?></h3></a>
	</div>

	<ul class="list-unstyled">
		<li><a href="<?php echo base_url(); ?>index.php/Cust_home/club"><i><img src="<?php echo base_url(); ?>assets/img/the-club-icon.svg"></i> The Club</a></li>
		<li><a href="<?php echo base_url(); ?>index.php/Cust_home/membership"><i><img src="<?php echo base_url(); ?>assets/img/member-benefits-icon.svg"></i> Club Membership</a></li>
		<li><a href="<?php echo base_url(); ?>index.php/Cust_home/accommodation"><i><img src="<?php echo base_url(); ?>assets/img/accommodation-icon.svg"></i> Accommodation</a></li>
		<li><a href="<?php echo base_url(); ?>index.php/Cust_home/facilities"><i><img src="<?php echo base_url(); ?>assets/img/facilities-icon.svg"></i> Other Facilities</a></li>
		<li><a href="<?php echo base_url(); ?>index.php/Cust_home/more"><i><img src="<?php echo base_url(); ?>assets/img/settings-icon.svg"></i> Settings</a></li>
		<li><a href="<?php echo base_url(); ?>index.php/Cust_home/contact"><i><img src="<?php echo base_url(); ?>assets/img/contact-us-icon.svg"></i> Contact Us</a></li>
		<li><a href="#" onclick="showConfirmation();"><i><img src="<?php echo base_url(); ?>assets/img/logout.svg"></i> Sign Out</a></li>
	</ul>
	<div id="confirmationModal" class="modal">
		<div class="modal-content">
			<p><b>Are you sure you want to Sign Out?</b></p>
			<button type="button" class="MainBtn w-100 text-center" onclick="confirmAction()">OK</button><br>
			<button type="button" class="MainBtn w-100 text-center" onclick="closeConfirmation()">Cancel</button>
		</div>
	</div>
</nav>
<script>
	function showConfirmation() 
	{
		var confirmationModal = document.getElementById('confirmationModal');
		confirmationModal.style.display = 'block';
	}
	function closeConfirmation() 
	{
		var confirmationModal = document.getElementById('confirmationModal');
		confirmationModal.style.display = 'none';
	}
	function confirmAction() 
	{
		var signout_url = "<?php echo base_url(); ?>index.php/Cust_home/signout";
		window.location.assign(signout_url);
		closeConfirmation();
	}
</script>
<style>
.modal {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
}

.modal-content {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    padding: 20px;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
}
</style>