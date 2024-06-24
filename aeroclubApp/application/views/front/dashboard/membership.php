<?php $this->load->view('front/header/header'); ?>
<header>
	<div class="container">
		<div class="row">
			<div class="col-12 d-flex justify-content-between align-items-center hedMain">
				<div class="leftRight"><button onclick="location.href = '<?php echo base_url(); ?>index.php/Cust_home/front_home';"><img src="<?php echo base_url(); ?>assets/img/back-icon.svg"></button></div>
				<div><h1>Join the Club!</h1></div>
				<div class="leftRight">&nbsp;</div>
			</div>
		</div>
	</div>
</header>

<main class="padTop2 padBottom commonRoundWrapper">
    <div class="imgHldr">
        <img src="<?php echo base_url(); ?>assets/img/img2.jpg">
    </div>
    <div class="BoxHldr">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <p>The Aero Club of East Africa is always pleased to welcome new members, temporary members and foreign air crew.</p>
                    <h2>Why join us?</h2>
                    <p>By joining the Aero Club of East Africa you will become part of one of the oldest clubs in Africa, have the chance to socialize and meet fellow aviators and enjoy a host of benefits for you and your family.</p>
                    <h5>Discounts on Accommodation & Dining</h5>
					<p>&nbsp;</p>
                   <!--<p>25% off Lodging - 10% off Java House</p>-->
                    <h5>AMREF Maisha Bronze Membership</h5>
                    <p>Free AMREF Bronze Membership for primary member.</p>
                    <h5>Aviation Benefits</h5>
                    <ul>
                        <li>Aircraft parking area</li>
                        <li>Assistances with processing flight plans</li>
                        <li>Passenger tax</li>
                        <li>Renewal of pilot licenses</li>
                        <li>Ground Handling Services</li>
                    </ul>
					<h5>Use of Club Facilities</h5>
                    <ul>
                        <li>Accommodation</li>
                        <li>Restaurant</li>
                        <li>Bar</li>
                        <li>Fitness Centre</li>
                        <li>Apron Access Facility</li>
                        <li>Orly Clubhouse</li>
                    </ul>
					<h5>Reciprocal Arrangements with other Clubs</h5><br>
					<h5>AMREF Maisha Bronze Cover( for principal Member)</h5><br>
                    <h2>How to join</h2>
                    <p>The Aero Club of East Africa is always pleased to welcome new members, temporary members and foreign air crew. </p>
                    <p>Find a proposer and a seconder (must have been members for at least three years)</p>
                    <h2 class="mb-4">Joining fee is KES 138,000/- (under-25 KES 69,000)</h2>
                    <h5>Annual subscription:</h5>
                    <p>Full member (Nairobi resident) - KES 32,500/-</p>
                    <p>Country member (Kenyan Resident outside Nairobi) - KES 24,700/-</p>
                    <p>Overseas member - KES 14,800/-</p>
                    <p>Subscriptions are due on 1st January of each year.</p>
                </div>
            </div>
        </div>
    </div>
</main>
<?php $this->load->view('front/header/footer'); ?>
<style>
.padTop2
{
	padding-top: 0px !important;
}
</style>