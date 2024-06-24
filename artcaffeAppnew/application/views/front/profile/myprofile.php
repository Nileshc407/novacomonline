<?php $this->load->view('front/header/header'); ?>
	<body style="background-image:url('<?php echo base_url(); ?>assets/img/profile-bg.jpg')">
	<div id="wrapper">
		<div class="custom-header">
			<div class="container">
				<div class="heading-wrap">
					<div class="icon back-icon">
						<a href="<?php echo base_url();?>index.php/Cust_home/front_home"></a>
					</div>
					<h2>My Profile</h2>
				</div>
			</div>
		</div>
		<div class="custom-body transparent">
			<nav class="menu-wrapper">
			<ul>
				<?php
					$page=0;
					if($_REQUEST){
						$page= $_REQUEST['page'];
					} else {
						$page=0;
					}
					// echo"<br>---page------".$page; 
				?>
                <li> <a href="<?php echo base_url();?>index.php/Cust_home/profile" <?php if($page==1){ ?> class="active" <?php } ?> >Personal Details</a>
					<ul class="submenu">                    
					</ul>
                </li>
                <li> <a href="<?php echo base_url();?>index.php/Cust_home/profile_address" <?php if($page==2){ ?> class="active" <?php } ?>>Address Details</a>
                  <ul class="submenu">                   
                  </ul>
                </li>
                <li> <a href="<?php echo base_url();?>index.php/Cust_home/changepassword" <?php if($page==3){ ?> class="active" <?php } ?>>Change Password</a>
                  <ul class="submenu">
                  </ul>
                </li>
            </ul>
        </nav>
		</div>
<?php $this->load->view('front/header/footer');  ?>