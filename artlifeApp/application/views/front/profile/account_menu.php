<?php $this->load->view('front/header/header'); ?>
<div class="custom-body">
	<div class="user_detail_link">
		<ul>
			<li>
				<a href="<?php echo base_url();?>index.php/Cust_home/profile">
					<span class="icon"><img src="<?php echo base_url(); ?>assets/brand-0/images/pen.svg"/></span>
					Edit Profile
				</a>
			</li>
			<li>
				<a href="<?php echo base_url();?>index.php/Cust_home/changepassword">
					<span class="icon"><img src="<?php echo base_url(); ?>assets/brand-0/images/pen.svg"/></span>
					Change Password
				</a>
			</li>
			<li>
				<a href="<?php echo base_url();?>index.php/Cust_home/settings">
					<span class="icon"><img src="<?php echo base_url(); ?>assets/brand-0/images/corg.svg"/></span>
					Notification Settings
				</a>
			</li>
			<li>
				<a href="<?php echo base_url();?>index.php/Cust_home/signout">
					<span class="icon"><img src="<?php echo base_url(); ?>assets/brand-0/images/signout.svg"/></span>
					Sign Out
				</a>
			</li>			
		</ul>
	</div>
</div>
	
<?php $this->load->view('front/header/footer');  ?>
