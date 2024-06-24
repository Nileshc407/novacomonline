 <?php 
	$ci_object = &get_instance(); 
	$ci_object->load->model('Igain_model');
	$item_count=0;
		
	$fetch_class=$this->router->fetch_class();
	$fetch_method=$this->router->fetch_method();

	$session_data = $this->session->userdata('cust_logged_in');
	$data['Company_id'] = $session_data['Company_id'];
	$data['enroll'] = $session_data['enroll'];
	
	$front_home='';
	$location='';		
	$brand_menu='';
	$aboutus='';
	$open_url='';
	$works='';
	
	if($fetch_method=='front_home'){
		
		$front_home='active';
		$location='';		
		$brand_menu='';
		$aboutus='';
		$open_url='';
		$works='';
	}
	if($fetch_method=='location'){
		
		$front_home='';
		$location='active';		
		$brand_menu='';
		$aboutus='';
		$open_url='';
		$works='';
	}	
	if($fetch_method=='brand_menu'){
		
		$front_home='';
		$location='';		
		$brand_menu='active';
		$aboutus='';
		$open_url='';
		$works='';
	}
	if($fetch_method=='aboutus'){
		
		$front_home='';
		$location='';		
		$brand_menu='';
		$aboutus='active';
		$open_url='';
		$works='';
	}
	if($fetch_method=='open_url'){
		
		$front_home='';
		$location='';		
		$brand_menu='';
		$aboutus='';
		$open_url='active';
		$works='';
	}
	if($fetch_method=='works'){
		
		$front_home='';
		$location='';		
		$brand_menu='';
		$aboutus='';
		$open_url='';
		$works='active';
	}	
 ?>
<footer>
	<ul class="iconMenu d-flex align-items-center">
		<li><a class="home <?php echo $front_home;?>" href="<?php echo base_url(); ?>index.php/Cust_home/front_home"><div class="txt">Home</div></a></li>
		<li><a class="location <?php echo $location;?>" href="<?php echo base_url(); ?>index.php/Cust_home/location"><div class="txt">Location</div></a></li>
		<li><a class="menu <?php echo $brand_menu;?>" href="<?php echo base_url(); ?>index.php/Cust_home/brand_menu"><div class="txt">Menu</div></a></li>
		<li><a class="radio <?php echo $open_url;?>" href="<?php echo base_url(); ?>index.php/Cust_home/open_url?url=https://www.javahouseradio.com"><div class="txt">Radio</div></a></li>
		<li><a class="story <?php echo $works;?>" href="<?php echo base_url(); ?>index.php/Cust_home/works"><div class="txt">Story</div></a></li>
	</ul>
</footer>
<div class="overlay"></div>

<script src="<?php echo base_url(); ?>assets/js/jquery-3.5.1.slim.min.js"></script>
<script>window.jQuery || document.write('<script src="/docs/4.5/assets/js/vendor/jquery.slim.min.js"><\/script>')</script>
<script src="<?php echo base_url(); ?>assets/js/popper.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/slick.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/common.js"></script>
	
</body>
</html>
<style>
	/* footer ul.iconMenu li a.noti{
		margin-left: -4px !IMPORTANT;
	}
	#count
	{
		position: absolute;
		right: 0;
		top: 0;
		background: #DB1E34;
		color: var(--dark);
		line-height: 15px;
		font-size: 11px;
		padding: 0 6px;
		border-radius: 50px;
		margin: 29px;
		font-weight: 600;
	} */
</style>