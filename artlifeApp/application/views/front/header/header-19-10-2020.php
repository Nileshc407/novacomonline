<!doctype html>
<html lang="">
<head>
    <!-- Required meta tags -->
    <!--<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">-->

    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1, maximum-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Artlife</title>
   
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/brand-0/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/brand-0/css/owl.carousel.min.css">
    
    
    <?php 


    /* if ($_SESSION['brndID']==1 && $this->router->fetch_method() != "myprofile") { //artcafe
    ?>
	
		<!-- Custome CSS -->
    	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/artcaffe/css/style.css">
		<!-- Fonts CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/artcaffe/font/font.css">        
        <!-- Artcaffe CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/artcaffe/css/style-artcaffe.css">
	
	<?php } else if ($_SESSION['brndID']==2 && $this->router->fetch_method() != "myprofile") { //shiba
    ?>
	
		<!-- Custome CSS -->
    	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/shiba/css/style.css">
		<!-- Fonts CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/shiba/font/font.css">
        <!-- shiba CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/shiba/css/style-shiba.css">
	
	
    <?php } else if ($_SESSION['brndID']==3 && $this->router->fetch_method() != "myprofile") { //urban
    ?>
	
		<!-- Custome CSS -->
    	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/urban/css/style.css">
		<!-- Fonts CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/urban/font/font.css">
        <!-- urban CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/urban/css/style-urban.css">
	
	
    <?php } else if ($_SESSION['brndID']==4 && $this->router->fetch_method() != "myprofile") { //ohcha
    ?>
	
		<!-- Custome CSS -->
    	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/ohcha/css/style.css">
		<!-- Fonts CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/ohcha/font/font.css">
        <!-- ohcha CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/ohcha/css/style-ohcha.css">	
	
    <?php } else if ($_SESSION['brndID']==5  && $this->router->fetch_method() != "myprofile") { //tapas
        ?>

        <!-- Custome CSS -->
    	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/tapas/css/style.css">
	
		<!-- Fonts CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/tapas/font/font.css">
        <!-- tapas CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/tapas/css/style-tapas.css">	
	
	<?php } else if ($_SESSION['brndID']==6 && $this->router->fetch_method() != "myprofile") { //style-dormans    
    ?>
	
		<!-- Custome CSS -->
    	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/dormans/css/style.css">
		<!-- Fonts CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dormans/font/font.css">
        <!-- dormans CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dormans/css/style-dormans.css">	
	
	<?php } else 
	*/ 
	if ($_SESSION['brndID'] && $this->router->fetch_method() != "myprofile" && $this->router->fetch_method() != "profile" && $this->router->fetch_method() != "account" && $this->router->fetch_method() != "changepassword"  && $this->router->fetch_method() != "statement" && $this->router->fetch_method() != "settings" && $this->router->fetch_method() != "mailbox" && $this->router->fetch_method() != "readnotifications" && $this->router->fetch_method() != "compose" ) { //style-dormans    
    ?>
	
		<!-- Custome CSS -->
    	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/brand-<?php echo $_SESSION['brndID']; ?>/css/style.css">
		<!-- Fonts CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/brand-<?php echo $_SESSION['brndID']; ?>/font/font.css">
        <!-- dormans CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/brand-<?php echo $_SESSION['brndID']; ?>/css/style-<?php echo $_SESSION['brndID']; ?>.css">	
	
	<?php } else { //artlife 
    ?>

    	<!-- Custome CSS -->
    	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/brand-0/css/style.css">
	
		<!-- Fonts CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/brand-0/font/font.css">
        <!-- artlife CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/brand-0/css/style.css">	
    
	<?php }  ?>    
    

    <!-- Responsive CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/brand-0/css/responsive.css">
	
	
	
</head>
<?php 
     $Current_point_balance = ($Enroll_details->Total_balance-$Enroll_details->Debit_points);

	if($Current_point_balance<0){
		$Current_point_balance=0;
	}else{
		$Current_point_balance=$Current_point_balance;
	}

	$total_gain_points=$total_gain_points->Total_gained_points;
	if($total_gain_points){
		$TotalGainPoints=$total_gain_points; 
	}else{
		$TotalGainPoints=0;
	}	
	$Total_Transfer_points=$Total_transfer->Total_Transfer_points;
	
	if($Total_Transfer_points){
		$Total_Transfer_points=$Total_transfer->Total_Transfer_points;
	}else{
		$Total_Transfer_points=0;
	}

    $Photograph=$Enroll_details->Photograph;
	
	
	//echo "----Photograph-----".$Photograph."---<br>";
	
	if($Photograph=="")
	{
            $Photograph=base_url()."assets/img/user2.svg";
		
	} else {
		
		$Photograph=$this->config->item('base_url2').$Photograph;
		
	}
?>
    <body>
	<div id="wrapper">
		<header>
			<button class="toggle-menu">
				<span></span>
				<span></span>
				<span></span>
			</button>
			<?php 
			
			// echo $_SESSION['brndID'];
			if($_SESSION['brndID'] && $this->router->fetch_method() != "myprofile" && $this->router->fetch_method() != "profile" && $this->router->fetch_method() != "account" && $this->router->fetch_method() != "changepassword"  && $this->router->fetch_method() != "statement" && $this->router->fetch_method() != "settings"  && $this->router->fetch_method() != "mailbox" && $this->router->fetch_method() != "readnotifications" && $this->router->fetch_method() != "compose")  { ?>
			<div class="logo">
               <?php if($_SESSION['brndID'] != 0 ){ ?>
						
					 <a href="#"><img src="<?php echo base_url(); ?>assets/brand-<?php echo $_SESSION['brndID']; ?>/logo/logo.png"/></a>
				   
                
                <?php } else { ?>
                	
                       <a href="#"><img src="<?php echo base_url(); ?>assets/brand-0/logo/logo.png"/></a>
                 <?php } ?>
			</div>
			<?php } else { ?>
				
				<div class="logo">
					
					<a href="#"><img src="<?php echo base_url(); ?>assets/brand-0/logo/logo.png"/></a>
				</div>
				
				
			<?php } ?>
			
			<div class="user-right" style="color:#158071;font-family: 'Nunito' !IMPORTANT;">
			Hello <?php echo ucwords($Enroll_details->First_name); //.' '.$Enroll_details->Last_name; ?> 
			<?php if($this->router->fetch_method() == "myprofile" || $this->router->fetch_method() == "statement") { ?>
				<span class="icon">
					<svg xmlns="http://www.w3.org/2000/svg" width="36.886" height="36.547" viewBox="0 0 36.886 36.547">
					  <path id="Path_3" data-name="Path 3" d="M30.231,13.06c.4-1.269,1.045-1.269,1.441,0l3.2,10.252a3.444,3.444,0,0,0,3.052,2.308H48.284c1.283,0,1.483.642.445,1.427l-8.38,6.337a3.654,3.654,0,0,0-1.166,3.734l3.2,10.253c.4,1.269-.128,1.666-1.166.882l-8.38-6.337a3.32,3.32,0,0,0-3.773,0l-8.38,6.337c-1.038.784-1.562.387-1.166-.882l3.2-10.253a3.655,3.655,0,0,0-1.166-3.734l-8.38-6.337c-1.038-.784-.837-1.427.445-1.427H23.976a3.443,3.443,0,0,0,3.052-2.308Z" transform="translate(-12.508 -12.108)" fill="#fffaf2"/>
					</svg>
				</span>
				<span class="text-primary"><?php echo $Currency_name; ?> <?php echo $Current_point_balance; ?></span>
			<?php } ?>
			</div>
			<nav>
				<div class="user_dtc">
					<button class="toggle-back"></button>
					<img src="<?php echo $Photograph; ?>" class="user_avtar"/>
					<h4><?php echo ucwords($Enroll_details->First_name).' '.ucwords($Enroll_details->Last_name); ?></h4>
					<p><?php echo $User_email_id; ?></p>
				</div>
				<ul>
					<li><a href="<?php echo base_url(); ?>index.php/Cust_home/myprofile">My Account</a></li>
					<li><a href="<?php echo base_url(); ?>index.php/Cust_home/works">How It Works</a></li>
				</ul>
                <?php if($_SESSION['brndID'] != 0 ){ ?>
				
				
                    <ul class="ul_light">
						
						
						
						<li><a href="#">View Offers</a></li>
						
						
						
						<?php
							if($_SESSION['brndID'] == 11 ){
								$LocationsUrl="https://www.artcaffe.co.ke/find-a-store";
							} else if($_SESSION['brndID'] == 123 ){
								$LocationsUrl="http://urbanburgers.co.ke/index.php/contact/";
							} else if($_SESSION['brndID'] == 125 ){
								$LocationsUrl="http://ohcha.co.ke/index.php/contact/";
							} else if($_SESSION['brndID'] == 127 ){
								$LocationsUrl="http://tapas.co.ke/index.php/contact/";
							} else if($_SESSION['brndID'] == 144 ){
								$LocationsUrl="JavaScript:void(0);";
							} 
							
						?>
					
					
					  <?php if($_SESSION['brndID'] != 121 && $_SESSION['brndID'] != 146){ ?>
							
							<li><a href="<?php echo $LocationsUrl; ?>">Locations</a></li>
							
					  <?php } ?>
						
						<?php
						if($_SESSION['brndID'] == 11 ){
							$AboutUs="https://www.artcaffe.co.ke/about/our-story";
						} else if($_SESSION['brndID'] == 121 ){
							$AboutUs="https://artcaffe.dpo.store/services";
						} else if($_SESSION['brndID'] == 123 ){
							$AboutUs="http://urbanburgers.co.ke/index.php/about/";
						} else if($_SESSION['brndID'] == 125 ){
							$AboutUs="http://ohcha.co.ke/index.php/about/";
						} else if($_SESSION['brndID'] == 127 ){
							$AboutUs="http://tapas.co.ke/index.php/about/";
						} else if($_SESSION['brndID'] == 144 ){
							$AboutUs="JavaScript:void(0);";
						} else if($_SESSION['brndID'] == 146 ){
							$AboutUs="JavaScript:void(0);";
						}
							
						?>
                        <li><a href="<?php echo $AboutUs; ?>">About Us</a></li>
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="<?php echo base_url(); ?>index.php/Cust_home/front_home">View All Brands</a></li>
                    </ul>
                <?php } ?>
			</nav>
            
		</header>