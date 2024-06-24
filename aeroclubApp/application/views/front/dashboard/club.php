<?php $this->load->view('front/header/header'); ?>

    <header>
        <div class="container">
            <div class="row">               
                <div class="col-12 d-flex justify-content-between align-items-center hedMain">
                    <div class="leftRight"><button onclick="location.href = '<?php echo base_url(); ?>index.php/Cust_home/front_home';"><img src="<?php echo base_url(); ?>assets/img/back-icon.svg"></button></div>
                    <div><h1>The Club</h1></div>
                    <div class="leftRight">&nbsp;</div>
                </div>
            </div>
        </div>
    </header>
<main class="padTop2 padBottom commonRoundWrapper">
    <!--<div class="imgHldr">
        <img src="<?php echo base_url(); ?>assets/img/img2.jpg">
    </div>-->
	
	<div class="theClubSlide">
		 <div><img src="<?php echo base_url(); ?>assets/img/the_club/the-club-img1.jpg" alt=" "></div>
        <div><img src="<?php echo base_url(); ?>assets/img/the_club/the-club-img2.jpg" alt=" "></div>
        <div><img src="<?php echo base_url(); ?>assets/img/the_club/the-club-img3.jpg" alt=" "></div>
        <div><img src="<?php echo base_url(); ?>assets/img/the_club/the-club-img4.jpg" alt=" "></div>
        <div><img src="<?php echo base_url(); ?>assets/img/the_club/the-club-img5.jpg" alt=" "></div>
    </div>
    <div class="BoxHldr">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <p>The Aero Club offers a friendly atmosphere where pilots, engineers and enthusiasts can get together, exchange ideas and relax in comfortable surroundings. </p>
                    <p>Since its inception, the Aero Club of East Africa has been at the forefront of aviation activities in the country: basic flying training, competitions, air shows, safety seminars, navigation, and so on. As the aviation world has grown and evolved, so too has the Aero Club.</p>
                    <h2>History</h2>
                    <p>"To promote, encourage and regulate aeronautics in Kenya, and to provide information and advice about aviation to all authorities and persons as might be required.” </p>
                    <p>These were the lofty objectives of the Aero Club of East Africa, founded on 31 July 1927 by 24 pilots and enthusiasts</p>  
					<p>The Aero Club of East Africa is now one of the oldest Aero Clubs in the World and offers a friendly atmosphere where pilots, engineers and enthusiasts can get together exchange ideas and relax in comfortable surroundings</p>
                    <p>In March 1928, under its first President, Lt. Col. A.C.E. Marsh, the Club became the official representative of the Royal Aero Club and on 18 May 1928 its name was changed to the Aero Club of East Africa.  That same year the Club was called upon to advise the Kenya Government on the site selection of the new Nairobi Aerodrome (now Wilson Airport) to replace the old Ngong Landing Field at Dagoretti.</p>
                    <p>The ground was levelled, and was first used on 19 February 1929 by an RAF flight of four Fairey III F’s on their way to Cape Town from Cairo.  The Clubhouse was built, and Lord Wakefield, a wealthy patron, sent over a Gipsy Moth from England.  Membership had grown to 209 and, by 1933, 25 of the members had earned their flying licences.</p>
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