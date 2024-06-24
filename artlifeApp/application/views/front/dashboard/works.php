<!doctype html>
<html lang="">
<head>
	<!-- Required meta tags -->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1, maximum-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Art Caffe</title>
	<!-- Bootstrap CSS -->
	<link href="<?php echo base_url(); ?>assets/brand-0/css/bootstrap.min.css" rel="stylesheet" > 
	<!-- Fonts CSS -->
	<link href="<?php echo base_url(); ?>assets/brand-0/font/font.css"  rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/brand-0/css/owl.carousel.min.css" rel="stylesheet" >
	<!-- Custome CSS -->
	<link href="<?php echo base_url(); ?>assets/brand-0/css/style.css" rel="stylesheet" >
	<!-- Responsive CSS -->
	<link href="<?php echo base_url(); ?>assets/brand-0/css/responsive.css"  rel="stylesheet" >
</head>
 <?php 
     /* $Current_point_balance = ($Enroll_details->Total_balance-$Enroll_details->Debit_points);

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

     */
	 $Photograph=$Enroll_details->Photograph;
	
	
	//echo "----Photograph-----".$Photograph."---<br>";
	
	if($Photograph=="")
	{
		$Photograph=base_url()."assets/brand-0/images/user.svg";
		// http://novacomonline.ehpdemo.online/artlifeApp/assets/img/user2.svg
		
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
			<div class="logo">
				<a href="#"><img src="<?php echo base_url(); ?>assets/brand-0/logo/artlife-logo.svg"/></a>
			</div>
			<div class="user-right">
			Hello <?php echo ucwords($Enroll_details->First_name); ?>
			</div>
			<nav>
				<div class="user_dtc">
					<button class="toggle-back"></button>
					<img src="<?php echo $Photograph; ?>" class="user_avtar"/>
					<h4><?php echo ucwords($Enroll_details->First_name).' '.ucwords($Enroll_details->Last_name); ?></h4>
					<p><?php echo $User_email_id; ?></p>
				</div>
				
				<ul class="ul_light">
					<li><a href="<?php echo base_url(); ?>index.php/Cust_home/myprofile">My Account</a></li>
					<li><a href="<?php echo base_url(); ?>index.php/Cust_home/works">How It Works</a></li>
					<li><a href="<?php echo base_url(); ?>index.php/Cust_home/front_home">View All Brands</a></li>
				</ul>
			</nav>
		</header>
		<div class="custom-body">
			<div class="first-card">
				<img src="<?php echo base_url(); ?>assets/brand-0/images/how-its-work.gif" class="d-block mx-auto"/>
			</div>
			<div class="accordion-card">
				<div class="accordion-in" id="accordion-main">
                    <div class="card">
                        <div class="card-header" id="accordion1">
                            <a href="#" class="btn btn-header-link collapsed dark-bg" data-toggle="collapse" data-target="#accord1"
                            aria-expanded="true" aria-controls="accord1">EARN Points</a>
                        </div>
                        <div id="accord1" class="collapse" aria-labelledby="accordion1" data-parent="#accordion-main">
                            <div class="card-body">
                                <div class="how-it-works-card">
                                	<div class="slider owl-carousel owl-theme">
				<div class="item">
					
                                		<i><img src="<?php echo base_url(); ?>assets/brand-0/images/earn-points-01.svg"></i>
                                		<p><strong>Dine in</strong> at any of our restaurants and use your mobile number upon settling your bill for your points to be updated</p>
                                	
				</div>
				<div class="item">
					
                                		<i><img src="<?php echo base_url(); ?>assets/brand-0/images/earn-points-02.svg"></i>
                                		<p><strong>Order for delivery</strong> online or by calling, and your points will automatically be updated using your mobile number.</p>
                                	
				</div>
				<div class="item">
					
                                		<i><img src="<?php echo base_url(); ?>assets/brand-0/images/Mouse-Cursor-Brown.svg"></i>
                                		<p><strong>Shop online</strong> on the Artcaffé Market and upon confirmation of your order your points will be automatically updated using your mobile number.</p>
                                	
				</div>
			</div>

                                	
                                	
                                	
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="accordion2">
                            <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#accord2"
                            aria-expanded="true" aria-controls="accord2">REDEEM Points</a>
                        </div>
                        <div id="accord2" class="collapse" aria-labelledby="accordion2" data-parent="#accordion-main">
                            <div class="card-body">
                                <div class="how-it-works-card">
                                	<div class="slider owl-carousel owl-theme">
				<div class="item">
					
                                		<i class="d-flex align-items-center"><img src="<?php echo base_url(); ?>assets/brand-0/images/earn-points-01.svg"></i>
                                		<p><strong>Dine in,</strong>Use your points when you dine-in by giving your waiter your your mobile number when settling your bill. Follow the prompt on your phone to input your pin and redeem your points.</p>
                                	
				</div>
				<div class="item">
					
                                		<i class="d-flex align-items-center"><img src="<?php echo base_url(); ?>assets/brand-0/images/earn-points-02.svg"></i>
                                		<p><strong>Ordering for delivery online,</strong> at checkout tick the box that says “Redeem Points”. You will receive a notification on your phone to input your pin.<br> When <strong>ordering for delivery by calling, </strong>upon confirming your order, your agent will ask / inform your agent you would like to redeem points. You will receive a notification on your phone prompting you confirm your intention to redeem your points.</p>
                                	
				</div>
				
			</div>

                                	
                                	
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
			</div>
		</div>
		<footer class="footer-shadow">
		
			
			<!--<div class="prev-arrow">
				<a href="<?php echo base_url(); ?>index.php/Cust_home/front_home"></a>
			</div>-->
			
			
			
			
			<ul>
				<li class="active">
					<a href="<?php echo base_url(); ?>index.php/Cust_home/front_home">
						<svg xmlns="http://www.w3.org/2000/svg" width="36.883" height="31.766" viewBox="0 0 36.883 31.766">
						  <g id="ICONS_8" data-name="ICONS 8" transform="translate(-12.225 -14.783)">
							<g id="Group_121" data-name="Group 121">
							  <g id="Group_120" data-name="Group 120">
								<path id="Path_362" data-name="Path 362" d="M48.9,31.365l-6.452-5.92v-8.85H36.28v3.192l-5.272-4.838a.64.64,0,0,0-.862,0L12.433,31.368a.64.64,0,0,0-.108.815.672.672,0,0,0,.573.3h4.444V45.91a.639.639,0,0,0,.639.639h8.342a.612.612,0,0,0,.613-.613V38.174a.773.773,0,0,1,.773-.773h5.916a.773.773,0,0,1,.773.773v7.762a.612.612,0,0,0,.613.613h8.342a.639.639,0,0,0,.639-.639V32.479h4.444a.672.672,0,0,0,.573-.3A.639.639,0,0,0,48.9,31.365Z" fill="#c1bdb7"/>
							  </g>
							</g>
						  </g>
						</svg>
					</a>
				</li>
				<li>
					<a href="<?php echo base_url(); ?>index.php/Cust_home/mailbox">
						<svg xmlns="http://www.w3.org/2000/svg" width="31.883" height="35.158" viewBox="0 0 31.883 35.158">
						  <g id="ICONS_9" data-name="ICONS 9" transform="translate(-14.112 -13.542)">
							<g id="Group_123" data-name="Group 123">
							  <g id="Group_122" data-name="Group 122">
								<g id="bell_30_">
								  <path id="XMLID_240_" d="M30.053,48.7a5.025,5.025,0,0,0,5.075-4.974H24.978A5.025,5.025,0,0,0,30.053,48.7Z" fill="#c1bdb7" fill-rule="evenodd"/>
								  <path id="XMLID_239_" d="M45.651,39.458l-3.7-4.088a3.315,3.315,0,0,1-.86-2.223v-5.8a11.146,11.146,0,0,0-9.121-10.959v-.923a1.92,1.92,0,1,0-3.84,0v.918a10.888,10.888,0,0,0-9.121,10.658v6.109a3.315,3.315,0,0,1-.86,2.223l-3.7,4.088a1.324,1.324,0,0,0,1.013,2.207h29.17A1.324,1.324,0,0,0,45.651,39.458Z" fill="#c1bdb7" fill-rule="evenodd"/>
								</g>
							  </g>
							</g>
						  </g>
						</svg>

						<span><?php echo $NotificationsCount->Open_notify; ?></span>
					</a>
				</li>
				<li>
					<a href="<?php echo base_url(); ?>index.php/Cust_home/points_history">
						<svg xmlns="http://www.w3.org/2000/svg" width="36.886" height="36.547" viewBox="0 0 36.886 36.547">
						  <path id="Path_3" data-name="Path 3" d="M30.231,13.06c.4-1.269,1.045-1.269,1.441,0l3.2,10.252a3.444,3.444,0,0,0,3.052,2.308H48.284c1.283,0,1.483.642.445,1.427l-8.38,6.337a3.654,3.654,0,0,0-1.166,3.734l3.2,10.253c.4,1.269-.128,1.666-1.166.882l-8.38-6.337a3.32,3.32,0,0,0-3.773,0l-8.38,6.337c-1.038.784-1.562.387-1.166-.882l3.2-10.253a3.655,3.655,0,0,0-1.166-3.734l-8.38-6.337c-1.038-.784-.837-1.427.445-1.427H23.976a3.443,3.443,0,0,0,3.052-2.308Z" transform="translate(-12.508 -12.108)" fill="#c1bdb7"/>
						</svg>

					</a>
				</li>
				<li>
					<a href="<?php echo base_url(); ?>index.php/Cust_home/myprofile">
						<svg width="30" height="28" viewBox="0 0 30 28" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M4.09146 23.4817C3.8359 24.1389 3.90892 24.869 4.31052 25.4532C4.71212 26.0373 5.33278 26.3659 6.06296 26.3659H23.8795C24.5732 26.3659 25.2303 26.0373 25.6319 25.4532C26.0335 24.869 26.1066 24.1389 25.851 23.4817C23.989 19.0276 19.7174 16.1433 14.9347 16.1433C10.152 16.1433 5.88042 19.0276 4.09146 23.4817Z" fill="#86869D"></path>
						<path d="M20.7757 8.47617C20.7757 5.26335 18.1471 2.63469 14.9343 2.63469C11.7214 2.63469 9.09277 5.26335 9.09277 8.47617C9.09277 11.689 11.7214 14.3177 14.9343 14.3177C18.1471 14.3177 20.7757 11.689 20.7757 8.47617Z" fill="#86869D"></path>
						</svg>

					</a>
				</li>
			</ul>
			
		</footer>
	</div>



	<!--Main jQuery-->
   <script src="<?php echo base_url(); ?>assets/brand-0/js/jquery-3.2.1.min.js"></script>
   <!--Bootstrap Min JS-->
   <script src="<?php echo base_url(); ?>assets/brand-0/js/popper.min.js"></script>
   <script src="<?php echo base_url(); ?>assets/brand-0/js/bootstrap.min.js"></script>
   <!--custom JS-->
   <script src="<?php echo base_url(); ?>assets/brand-0/js/owl.carousel.min.js"></script>
   <script src="<?php echo base_url(); ?>assets/brand-0/js/custom.js"></script>
   <script>
		$(document).ready(function(){
			$('.slider').owlCarousel({
				loop:true,
				margin:0,
				nav:false,
				dots:true,
				autoplay:true,
				autoplayTimeout:5000,
				autoplayHoverPause:false,
				responsive:{
					0:{
						items:1
					},
					600:{
						items:1
					},
					1000:{
						items:1
					}
				}
			})
		})

		$( document ).ready(function() {
	        $( ".card-header a" ).click(function() {
	            $( ".custom-body" ).toggleClass( "hide-up" );
	        });
	    });  

	    $( document ).ready(function() {
	        $( "#accordion2 a" ).click(function() {
	            $( ".custom-body" ).toggleClass( "hide-up-2" );
	        });
	    });  
   </script>
   
</body>
</html>