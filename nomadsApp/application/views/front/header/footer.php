 <?php 	
$fetch_class=$this->router->fetch_class();
$fetch_method=$this->router->fetch_method();

$pointscss='';
$homecss='';		 
$usercss='';
$noticss='';
$homecolor='';
$noticolor='';
$pointscolor='';
$usercolor='';

if($fetch_method=='open_url' || $fetch_method=='redeem_history' || $fetch_method=='Points_history' || $fetch_method=='select_stamp_brand'|| $fetch_method=='Get_stamps_by_brand'|| $fetch_method=='My_vouchers'|| $fetch_method=='Vouchers_history'|| $fetch_method=='Redeem_points_QRCode' || $fetch_method=='aboutus'){
	
	$pointscss='active';
	$pointscolor='#DB1E34';	
	$homecss='';
	$usercss='';
	$noticss='';
	
}
if($fetch_method=='front_home' || $fetch_method=='select_brand' || $fetch_method=='set_brand'|| $fetch_method=='special_offer' || $fetch_method=='contactus_App'|| $fetch_method=='location' || $fetch_method=='works' || $fetch_method=='contactus'){
	
	$pointscss='';
	$homecss='active';
	$homecolor='#DB1E34';			
			
	$usercss='';
	$noticss='';
	
}
if($fetch_method=='myprofile' || $fetch_method=='profile' || $fetch_method=='transactions'|| $fetch_method=='settings'|| $fetch_method=='changepassword'|| $fetch_method=='terms_conditions'|| $fetch_method=='privacy_policy'  || $fetch_method=='Verify_email' || $fetch_method=='Verified_email' || $fetch_method=='Verifiy_pin'){
	
	$pointscss='';
	$homecss='';
	$usercss='active';
	$noticss='';
	$usercolor='#DB1E34';
}
if($fetch_method=='mailbox' || $fetch_method=='compose' || $fetch_method=='readnotifications'){
	
	$pointscss='';
	$homecss='';
	$usercss='';
	$noticss='active';
	$noticolor='#DB1E34';
}	
 ?>
<footer>
	<ul class="iconMenu d-flex align-items-center">
		<li><a class="home <?php echo $homecss; ?>" href="<?php echo base_url(); ?>index.php/Cust_home/front_home">&nbsp;
		<span style="position: absolute;top: 28%;left: 33%;font-size: 10px;color:<?php echo $homecolor; ?>"></span></a>
		</li>
		<li><a class="user <?php echo $usercss; ?>" href="<?php echo base_url(); ?>index.php/Cust_home/myprofile">&nbsp;
		<span style="position: absolute;top: 28%;left: 24%;font-size: 10px;color:<?php echo $usercolor; ?>"></span></a>
		</li>
		<!--<?php //echo base_url(); ?>index.php/Cust_home/redeem_history--->
		<li><a class="points <?php echo $pointscss; ?>" href="<?php echo base_url(); ?>index.php/Cust_home/open_url?url=https://www.javahouseradio.com">&nbsp;
		<span style="position: absolute;top: 28%;left: 12%;font-size: 10px;color:<?php echo $pointscolor; ?>"></span></a>
		</li>
		<li><a class="noti <?php echo $noticss; ?>" href="<?php echo base_url(); ?>index.php/Cust_home/mailbox">&nbsp;
		<span style="position: absolute;top: 28%;left: 0%;font-size: 10px;color:<?php echo $noticolor; ?>"></span></a>
		</li>
	</ul>
</footer>
<div class="overlay"></div>	
<script src="<?php echo base_url(); ?>assets/js/jquery-3.5.1.slim.min.js"></script>
<script>window.jQuery || document.write('<script src="/docs/4.5/assets/js/vendor/jquery.slim.min.js"><\/script>')</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/slick.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/common.js"></script>	
</body>
</html>
<style>
	/* footer ul.iconMenu li a.noti{
		margin-left: -4px !IMPORTANT;
	} */
</style>