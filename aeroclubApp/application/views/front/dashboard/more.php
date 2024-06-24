<?php $this->load->view('front/header/header'); ?>
  
	<header>
        <div class="container">
            <div class="row">
                <div class="col-12 d-flex justify-content-between align-items-center hedMain">
                    <div class="leftRight"><a href="<?php echo base_url(); ?>index.php/Cust_home/front_home"><img src="<?php echo base_url(); ?>assets/img/back-icon.svg"></a></div>
                    <div><h1>Setting</h1></div>
                    <div class="leftRight">&nbsp;</div>
                </div>
            </div>
        </div>
    </header>

<main class="padTop padBottom">
    <div class="container">
        <div class="row">
            <div class="col-12 px-0 moreWrapper">
                <ul class="moreMenu">
                    <li class="blueTxt"><b>General Settings</b></li>
                    <li>
                        <a class="w-100" href="<?php echo base_url(); ?>index.php/Cust_home/profile">
                            <div class="d-flex align-items-center">
                                <div class="titleTxtMain">Edit Profile</div>
                                <div class="rightIcon ml-auto"><img src="<?php echo base_url(); ?>assets/img/right-icon.svg"></div>
                            </div>
                        </a>
                    </li>
					<li>
                        <a class="w-100" href="<?php echo base_url(); ?>index.php/Cust_home/changepassword">
                            <div class="d-flex align-items-center">
                                <div class="titleTxtMain">Change Password</div>
                                <div class="rightIcon ml-auto"><img src="<?php echo base_url(); ?>assets/img/right-icon.svg"></div>
                            </div>
                        </a>
                    </li>
					 <li>
                        <div class="d-flex align-items-center w-100">
                            <div class="titleTxtMain">Notifications</div>
                            <div class="ml-auto">
                                <label class="switch">
                                    <input type="checkbox" checked>
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                    </li>
                </ul>

				<ul class="moreMenu">
                    <li class="blueTxt"><b>Support</b></li>
                    <!--<li>
                        <a class="w-100" href="<?php echo base_url(); ?>index.php/Cust_home/mailbox">
                            <div class="d-flex align-items-center">
                                <div class="titleTxtMain">Notifications</div>
                                <div class="rightIcon ml-auto"><img src="<?php echo base_url(); ?>assets/img/right-icon.svg"></div>
                            </div>
                        </a>
                    </li>-->
                    <li>
                        <a class="w-100" href="<?php echo base_url(); ?>index.php/Cust_home/terms_conditions">
                            <div class="d-flex align-items-center">
                                <div class="titleTxtMain">Terms & Conditions</div>
                                <div class="rightIcon ml-auto"><img src="<?php echo base_url(); ?>assets/img/right-icon.svg"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a class="w-100" href="<?php echo base_url(); ?>index.php/Cust_home/privacy_policy">
                            <div class="d-flex align-items-center">
                                <div class="titleTxtMain">Privacy Policy</div>
                                <div class="rightIcon ml-auto"><img src="<?php echo base_url(); ?>assets/img/right-icon.svg"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a class="w-100" href="#" onclick="showConfirmation();">
                            <div class="d-flex align-items-center">
                                <div class="titleTxtMain">Signout</div>
                                <div class="rightIcon ml-auto"><img src="<?php echo base_url(); ?>assets/img/right-icon.svg"></div>
                            </div>
                        </a>
                    </li>
                </ul>
				<div id="confirmationModal" class="modal">
					<div class="modal-content">
						<p><b>Are you sure you want to Sign Out?</b></p>
						<button type="button" class="MainBtn w-100 text-center" onclick="confirmAction()">OK</button><br>
						<button type="button" class="MainBtn w-100 text-center" onclick="closeConfirmation()">Cancel</button>
					</div>
				</div>
            </div>
        </div>
    </div>
</main>
<?php $this->load->view('front/header/footer'); ?>
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