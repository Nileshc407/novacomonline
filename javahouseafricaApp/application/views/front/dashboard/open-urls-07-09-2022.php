<?php 
//$this->load->view('front/header/header'); 
$this->load->view('front/header/menu'); 
?>  
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>..:: JAVA HOUSE ::..</title>
  <meta name="viewport" content="width=device-width,initial-scale=1, maximum-scale=1">
	<!-- Owl Stylesheets -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/slick.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/slick-theme.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/intlTelInput.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-datepicker.css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/styles.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
   <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
   <![endif]-->
   
  
	<style>
		
		<!-- .no-js #loader { display: none;  }
		.js #loader { display: block; position: absolute; left: 100px; top: 0; }
		.se-pre-con {
			position: fixed;
			left: 0px;
			top: 0px;
			width: 100%;
			height: 100%;
			z-index: 9999;
			background: url(<?php echo base_url(); ?>assets/images/loader.gif) center no-repeat transparent;
		} -->
	</style>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
	<script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
<script>
	//paste this code under head tag or in a seperate js file.
	// Wait for window load
	// $(window).load(function() {
		// $(".se-pre-con").fadeOut("fast");;
	// });
</script>
		
</head>
<body>
<!-- Paste this code after body tag -->
	<!--<div class="se-pre-con"></div>-->
<!-- Ends -->
	
	
 <header>
	<div class="container">
		<div class="row">
			<div class="col-12" style="height: 22px;">
				<!--<img style="height: 44px;" src="<?php echo base_url(); ?>assets/img/default-black-top.png">-->
			</div>
			<div class="col-12 d-flex justify-content-between align-items-center hedMain">
				<div class="leftRight"><button id="sidebarCollapse" onclick="location.href = '<?php echo base_url(); ?>index.php/Cust_home/front_home';" ><img src="<?php echo base_url(); ?>assets/img/back-icon.svg"></button></div>
				<div><img src="<?php echo base_url(); ?>assets/img/java-icon/java-house-logo-big.svg"></div>
				<div class="leftRight">&nbsp;</div>
			</div>
		</div>
	</div> 
</header>
<main class="padTop1 padBottom">
	<div class="container">
		<!--<div class="row">
			<div class="col-12 d-flex justify-content-between align-items-center">
				<audio controls style="margin: 0 auto;">
				  <source src="https://n0b.radiojar.com/mdyrqwaugy8uv?1657876071=&rj-tok=AAABggFozy8A096Ogd2W7PJ87g&rj-ttl=5">
				</audio>
			</div>
		</div>-->
		<iframe src="<?php echo $url; ?>" name="iframe_a" title="Iframe Example"  http-equiv="Content-Security-Policy"  content="default-src 'self'; img-src https://*; child-src 'none';">
		
	   
	  </iframe>
	  
	  <!---<?php //echo $url; ?>   https://n0b.radiojar.com/mdyrqwaugy8uv?1657876071=&rj-tok=AAABggFozy8A096Ogd2W7PJ87g&rj-ttl=5-->
		
	</div>
</main>

<!--vc_row wpb_row vc_row-fluid vc_custom_1626882730224 vc_row-has-fill sc_bg_mask_1 shape_divider_top-none shape_divider_bottom-none sc_layouts_row sc_layouts_row_type_normal -->


<?php $this->load->view('front/header/footer');  ?>
        
	<style>	
	.vc_column-inner{
		display:none !IMPORTANT;
	}
		body {
    margin: 0;            /* Reset default margin */
}
iframe {
    display: block;       /* iframes are inline by default */

    border: none;         /* Reset default border */
    height: 100vh;        /* Viewport-relative units */
    width: 100vw;
}
.container{
	padding: 0 !IMPORTANT;
}
</style>
        