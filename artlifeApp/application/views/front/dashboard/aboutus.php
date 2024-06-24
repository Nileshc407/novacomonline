<?php $this->load->view('front/header/header'); ?>

<?php
	$Current_point_balance = ($Enroll_details->Total_balance-$Enroll_details->Debit_points);
	if($Current_point_balance<0){
		$Current_point_balance=0;
	}else{
		$Current_point_balance=$Current_point_balance;
	}
	
?>
	<div class="custom-body custom-height">
		<!--<iframe src="<?php echo $url; ?>" name="iframe_a" height="500px" width="100%" title="Iframe Example"></iframe>	-->
		
			<div class="slider owl-carousel owl-theme">
				<div class="item">
					<img src="<?php echo base_url(); ?>assets/brand-<?php echo $_SESSION['brndID']; ?>/images/banner-1.jpg"/>
				</div>
				<div class="item">
					<img src="<?php echo base_url(); ?>assets/brand-<?php echo $_SESSION['brndID']; ?>/images/banner-2.jpg"/>
				</div>
				<div class="item">
					<img src="<?php echo base_url(); ?>assets/brand-<?php echo $_SESSION['brndID']; ?>/images/banner-3.jpg"/>
				</div>
				<?php if($_SESSION['brndID'] != 127 && $_SESSION['brndID'] != 121) { ?>
				<div class="item">
					<img src="<?php echo base_url(); ?>assets/brand-<?php echo $_SESSION['brndID']; ?>/images/banner-4.jpg"/>
				</div>
				<?php } ?>
			</div>
				
					<div class="first-card">						
						<div class="welcome-card">

							<?php if($_SESSION['brndID'] == 11) { ?>
								<!--<strong> <p>Our Story</p> </strong>-->
								<p>Our journey started thirteen years ago when our first Artcaffé restaurant opened its doors at Westgate Mall. With that flagship store, we set out to bring to life a series of high-quality restaurants that offer not only delicious food and exceptional service, but unparalleled ambience too. Today, we have 20 stores across Nairobi, and are one of the only brands to achieve ‘Superbrand’ status in East Africa.</p>

								<p>More than a restaurant, Artcaffé is a lifestyle and a social hub in the buzzing capital of Kenya. We are firm believers that dining is about so much more than food. We combine inspirational spaces, quality products, and a sense of community to give you the full Artcaffé experience.</p>
							<?php } ?>
							<?php if($_SESSION['brndID'] == 121) { ?>
								<p>We are thrilled to bring you The Artcaffé Market – keeping you inspired, entertained and well fed at home!</p>
								<p>We hope you and your family enjoy this exciting new service as we continue to bring innovative ways to enrich and simplify your lives, especially at this challenging time.</p>
								<p>We will continue to add new delicious products, great packages and additional home convenience services…so be sure to watch this space!</p>
							<?php } ?>
							<?php if($_SESSION['brndID'] == 123) { ?>
								<p>Let’s settle the score…</p>
								<p>We’re taking the humble burger to a whole new level with flavours that pack a punch! With 19 juicy and delicious burgers and a variety of extras and toppings on our menu to choose from, there’s something to beat all cravings.</p>
								<p>Tuck into sizzling flame-grilled burgers made with top quality fresh ingredients. These are bold burgers, burgers with game - give our 100% prime beef burgers, lamb, chicken or vegetarian options a try, all served with fries or coleslaw.</p>
								<p>From the grill, we offer succulent steaks, chicken and fish, and lip-smacking starters and</p>
								<p>To top it all off, fanatics and enthusiasts can watch all live matches and big sports events on our huuuuge HD screens!</p>
								<p>Delicious shakes and desserts wrap up a perfect meal, while the bar is fully stocked with beers, cocktails and wines to enjoy while you catch the action and soak up the atmosphere.</p>
								<p>This is what awesome tastes like…we know you’ll be a fan!</p>
							<?php } ?>
							<?php if($_SESSION['brndID'] == 125) { ?>
								<p>OhCha is a fun, filling and flavourful<br>
								takeout in Nairobi inspired by the<br>
								tastes of South East Asia,<br>
								prepared fresh and delivered fast<br>
								...from the wok to you!</p>
							<?php } ?>
							<?php if($_SESSION['brndID'] == 127) { ?>
								<p>Tapas Ceviche Bar is borne from the love of authentic Spanish food, good wine and great hospitality. Our bustling bar is a one-of-a kind in the city and has since become the home of Spanish influence in Nairobi.</p>
							<?php } ?>
							
						</div>
					</div>
		
	</div>
	<?php $this->load->view('front/header/footer');  ?>