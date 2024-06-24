<?php 
$this->load->view('front/header/header'); 
$this->load->view('front/header/menu');  
?>
 <header>
	<div class="container">
		<div class="row">
			<div class="col-12" style="height: 44px;"></div>
			<div class="col-12 d-flex justify-content-between align-items-center hedMain">
				<div class="leftRight">&nbsp;</div>
				<div><h1>Our Story</h1></div>
				<div class="leftRight">&nbsp;</div>
			</div>
		</div>
	</div>
</header>
<main class="padTop commonRoundWrapper">
    <div class="BoxHldr marBottom">
        <div class="container comHeight scrollbarMain">
            <div class="row">
                <div class="col-12">
                    <p>Java House, commonly referred to as ‘Java’, opened its first store in 1999 at Adam’s Arcade in Nairobi. With the aim of introducing gourmet coffee drinking culture in Kenya, the first outlet was a coffee shop and later the brand evolved to an American diner style restaurant to its present-day status as a 3 -day part coffee-led, casual dining concept.</p>
                    <p>Java House is now one of the leading coffee brands in Africa and has grown to have outlets in 14 cities across 3 countries in East Africa (Kenya, Uganda and Rwanda). It has also birthed two sister brands Planet Yogurt, a healthy, tasty and fun frozen yogurt store and 360 Degrees Pizza, a casual dining restaurant.</p>
                    <p>“Welcome to Java. A home away from home”</p>
                    <h2>Java Foundation</h2>
                    <p>Java, under the auspices of Java Foundation, will feed 1000 school children daily by partnering with the Food for Education program.</p>
                    <p><img class="w-100" src="<?php echo base_url(); ?>assets/img/java-foundation.jpg"></p>
                    <h2>Why team up with Food for Education?</h2>
                    <p>Food for Education are a non-profit organization working with children in the public school system to ensure their properly nourished and focused on learning. They have served up 6,000,000 meals to date. They currently have central kitchens in Nairobi, Kiambu and Mombasa serving up 33,000 kids everyday. We’ve jointly identified Drive-inn Primary School in Ruaraka; a partnership that will precipitate more kids accessing nutritious meals while in school.</p>
                    <p><img class="w-100" src="<?php echo base_url(); ?>assets/img/community.png"></p>
                    <p>Food For Education uses Tap2Eat which is a digital mobile platform that uses cutting edge FinTech to enable public primary schoolchildren access nutritious food for education.</p>
                    <p>Parents pay Ksh 15 (US $0.15) for the subsidised lunches using mobile money. The amount is credited to a virtual wallet linked to an NFC smart wrist band which students use to thenTap2Eat in under 5 seconds.</p>
                </div>
            </div>
        </div>
    </div>
</main>
<?php $this->load->view('front/header/footer');  ?>
