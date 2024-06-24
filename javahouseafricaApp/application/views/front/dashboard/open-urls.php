<?php //$this->load->view('front/header/header'); ?>  
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>..:: JAVA HOUSE ::..</title>
  <meta name="viewport" content="width=device-width,initial-scale=1, maximum-scale=1">
	<!-- Owl Stylesheets -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/slick.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/slick-theme.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/styles.css"/>
<style>	
html,body{
 height: 100%;
}
body {
  background-image: url("<?php echo base_url(); ?>assets/img/javapage.png");
   background-position: center center;
  background-repeat:  no-repeat;
  background-attachment: fixed;
  background-size:  cover;
}
</style>	
</head>
<body>
<header>
	<div class="container">
		<div class="row">
			<div class="col-12" style="height: 44px;"></div>
			<div class="col-12 d-flex justify-content-between align-items-center hedMain">
				<div class="leftRight">&nbsp;</div>
				<div><img src="<?php echo base_url(); ?>assets/img/java-icon/java-house-logo-big.svg"></div>
				<div class="leftRight">&nbsp;</div>
			</div>
		</div>
	</div>
</header>
<main class="padTop commonRoundWrapper feedbackWrapper">
  
	<div class="container">
		<iframe src="<?php echo $url; ?>" name="iframe_a" title="Iframe Example"  http-equiv="Content-Security-Policy"  content="default-src 'self'; img-src https://*; child-src 'none';">
	  </iframe>
	</div>

</main>
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