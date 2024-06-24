<?php $this->load->view('front/header/header'); ?>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<header>
	<div class="container">
		<div class="row">
			
			<div class="col-12 d-flex justify-content-between align-items-center hedMain">
				<div class="leftRight"><button onclick="location.href = '<?php echo base_url(); ?>index.php/Cust_home/front_home';"><img src="<?php echo base_url(); ?>assets/img/back-icon.svg"></button></div>
				<div><h1>Accommodation</h1></div>
				<div class="leftRight">&nbsp;</div>
			</div>
		</div>
	</div>
</header>
<main class="padTop padBottom">
    <!--<div class="container">
        <div class="row">
            <div class="col-12 aeroFacilitiesWrapper">
                <p class="mb-4">Newly refurbished rooms (in Captain & Pilot Wing) offer comfortable and convenient accommodation.</p>
            </div>
        </div>
    </div>-->
    <div class="container">
        <div class="row">
        <div class="col-12">
            <div class="accordion" id="accordionExample">
                <div class="card">
				
					<div class="container" style="padding-right: 6px;padding-left: 6px;">
					  
					  <div id="myCarousel" class="carousel slide" data-ride="carousel">
						<!-- Indicators -
						<ol class="carousel-indicators">
						  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
						  <li data-target="#myCarousel" data-slide-to="1"></li>
						</ol>
						<!-- Wrapper for slides -->
						<div class="carousel-inner">
							<div class="item active">
								<img src="<?php echo base_url(); ?>assets/img/2021_Crew_Rooms_44.jpg" alt="Crew Wing" style="width:100%;">
							</div>

							<div class="item">
								<img src="<?php echo base_url(); ?>assets/img/2021_Crew_Rooms_77.jpg" alt="Crew Wing" style="width:100%;">
							</div>
					  
						</div>

						<!-- Left and right controls 
						<a class="left carousel-control" href="#myCarousel" data-slide="prev">
						  <span class="glyphicon glyphicon-chevron-left"></span>
						  <span class="sr-only">Previous</span>
						</a>
						<a class="right carousel-control" href="#myCarousel" data-slide="next">
						  <span class="glyphicon glyphicon-chevron-right"></span>
						  <span class="sr-only">Next</span>
						</a>-->
					  </div>
					</div>
					
				
                  <!--<div class="img"><img class="mr-2" src="<?php echo base_url(); ?>assets/img/2021_Crew_Rooms_44.jpg"></div>
				  <br>
                  <div class="img"><img class="mr-2" src="<?php echo base_url(); ?>assets/img/2021_Crew_Rooms_77.jpg"></div>
				  -->
                  <div class="card-head" id="headingOne">
                    <h2 class="mb-0 collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Crew Wing
                    </h2>
                  </div>
              
                  <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        Enjoy a swim or relax around the pool.
                    </div>
                  </div>
                </div>
				<div class="card">
                  <!-- <div class="img"><img class="mr-2" src="img/img1.jpg"></div> -->
                  <div class="accommodationSlide">
                    <div><img src="<?php echo base_url(); ?>assets/img/captain_wing/captain-wing-img1.jpg" alt=" "></div>
                    <div><img src="<?php echo base_url(); ?>assets/img/captain_wing/captain-wing-img2.jpg" alt=" "></div>
                    <div><img src="<?php echo base_url(); ?>assets/img/captain_wing/captain-wing-img3.jpg" alt=" "></div>
                    <div><img src="<?php echo base_url(); ?>assets/img/captain_wing/captain-wing-img4.jpg" alt=" "></div>
                    <div><img src="<?php echo base_url(); ?>assets/img/captain_wing/captain-wing-img5.jpg" alt=" "></div>
                    <div><img src="<?php echo base_url(); ?>assets/img/captain_wing/captain-wing-img6.jpg" alt=" "></div>
                    <div><img src="<?php echo base_url(); ?>assets/img/captain_wing/captain-wing-img7.jpg" alt=" "></div>
                    <div><img src="<?php echo base_url(); ?>assets/img/captain_wing/captain-wing-img8.jpg" alt=" "></div>
                    <div><img src="<?php echo base_url(); ?>assets/img/captain_wing/captain-wing-img9.jpg" alt=" "></div>
                  </div>
                  <div class="card-head" id="headingThree">
                    <h2 class="mb-0 collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Captain Wing
                    </h2>
                  </div>
                  <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                    <div class="card-body">
                       Captain Wing
                    </div>
                  </div>
                </div>
				<div class="card">
                  <!-- <div class="img"><img class="mr-2" src="img/img1.jpg"></div> -->
                  <div class="accommodationSlide">
                    <div><img src="<?php echo base_url(); ?>assets/img/pilot_wing/pilot-wing-img1.jpg" alt=" "></div>
                    <div><img src="<?php echo base_url(); ?>assets/img/pilot_wing//pilot-wing-img2.jpg" alt=" "></div>
                    <div><img src="<?php echo base_url(); ?>assets/img/pilot_wing//pilot-wing-img3.jpg" alt=" "></div>
                    <div><img src="<?php echo base_url(); ?>assets/img/pilot_wing//pilot-wing-img4.jpg" alt=" "></div>
                    <div><img src="<?php echo base_url(); ?>assets/img/pilot_wing//pilot-wing-img5.jpg" alt=" "></div>
                    <div><img src="<?php echo base_url(); ?>assets/img/pilot_wing//pilot-wing-img6.jpg" alt=" "></div>
                    <div><img src="<?php echo base_url(); ?>assets/img/pilot_wing//pilot-wing-img7.jpg" alt=" "></div>
                    <div><img src="<?php echo base_url(); ?>assets/img/pilot_wing//pilot-wing-img8.jpg" alt=" "></div>
                    <div><img src="<?php echo base_url(); ?>assets/img/pilot_wing//pilot-wing-img9.jpg" alt=" "></div>
                  </div>
                  <div class="card-head" id="headingTwo">
                    <h2 class="mb-0 collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Pilot Wing
                    </h2>
                  </div>
                  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                    <div class="card-body">
                       Pilot Wing
                    </div>
                  </div>
                </div>
               <!--<div class="card">
                  <div class="card-head" id="headingFour">
                    <h2 class="mb-0 collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        <img class="mr-2" src="<?php echo base_url(); ?>assets/img/members-lounge-icon.svg"> 2022 Room Rates
                    </h2>
                  </div>
                  <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                    <div class="card-body">
                      <div class="row">
						<div class="col-12">
							<img src="<?php echo base_url(); ?>assets/img/Room_rates_2022.png" style="width:100%;">
						</div>
                      </div>
                    </div>
                  </div>
                </div>-->

                <div class="card">
                  <div class="card-head" id="headingFive">
                    <h2 class="mb-0 collapsed" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                        <img class="mr-2" src="<?php echo base_url(); ?>assets/img/restaurant-deck-icon.svg"> 2023 Room Rates
                    </h2>
                  </div>
                  <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
                    <div class="card-body">
                      <div class="row">
						<div class="col-12">
							<img src="<?php echo base_url(); ?>assets/img/Room_rates_2023.png" style="width:100%;">
						</div>
                      </div>
                    </div>
                  </div>
                </div>
    
              </div>
        </div>
        </div>
        </div>
</main>
<?php $this->load->view('front/header/footer'); ?>
<script>
 $('#myCarousel').carousel({
   interval: 1000
  });
 </script>  
<style>
 .padTop {
    padding-top: 60px;
}
</style>