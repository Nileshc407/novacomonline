<?php $this->load->view('front/header/header'); ?>
<header>
	<div class="container">
		<div class="row">
			 <div class="col-12 d-flex justify-content-between align-items-center hedMain">
				<div class="leftRight"><button onclick="location.href = '<?php echo base_url(); ?>index.php/Cust_home/front_home';"><img src="<?php echo base_url(); ?>assets/img/back-icon.svg"></button></div>
				<div><h1>Other Facilities</h1></div>
				<div class="leftRight">&nbsp;</div>
			</div>
		</div>
	</div>
</header>

<main class="padTop padBottom">
    <div class="container">
        <div class="row">
        <div class="col-12">
            <div class="accordion" id="accordionExample">
                <div class="card">
                 <!-- <div class="img"><img class="mr-2" src="<?php echo base_url(); ?>assets/img/img1.jpg"></div>-->
				   <div class="facilitieSlide">
                    <div><img src="<?php echo base_url(); ?>assets/img/swimming_pool/swimming-pool-img1.jpg" alt=" "></div>
                    <div><img src="<?php echo base_url(); ?>assets/img/swimming_pool/swimming-pool-img2.jpg" alt=" "></div>
                    <div><img src="<?php echo base_url(); ?>assets/img/swimming_pool/swimming-pool-img3.jpg" alt=" "></div>
                    <div><img src="<?php echo base_url(); ?>assets/img/swimming_pool/swimming-pool-img4.jpg" alt=" "></div>
                    <div><img src="<?php echo base_url(); ?>assets/img/swimming_pool/swimming-pool-img5.jpg" alt=" "></div>
                    <div><img src="<?php echo base_url(); ?>assets/img/swimming_pool/swimming-pool-img6.jpg" alt=" "></div>
                    <div><img src="<?php echo base_url(); ?>assets/img/swimming_pool/swimming-pool-img7.jpg" alt=" "></div>
                    <div><img src="<?php echo base_url(); ?>assets/img/swimming_pool/swimming-pool-img8.jpg" alt=" "></div>
                  </div>
                  <div class="card-head" id="headingOne">
                    <h2 class="mb-0 collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <img class="mr-2" src="<?php echo base_url(); ?>assets/img/swimming-icon.svg"> Swimming Pool
                    </h2>
                  </div>
              
                  <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                       The poolside ambiance offers the perfect setting to unwind and soak up the sun. Immerse yourself in serenity and indulge in moments of leisure and rejuvenation.
					   <br><br><h6>Operational hours : 6am – 6pm <h6>
                    </div>
                  </div>
                </div>
    
                <div class="card">
                  <!--<div class="img"><img class="mr-2" src="<?php echo base_url(); ?>assets/img/ACEA_Gym_06_2019_800x600.jpg"></div>-->
				  <div class="facilitieSlide">
                    <div><img src="<?php echo base_url(); ?>assets/img/gym/gym-img1.jpg" alt=" "></div>
                    <div><img src="<?php echo base_url(); ?>assets/img/gym/gym-img2.jpg" alt=" "></div>
                    <div><img src="<?php echo base_url(); ?>assets/img/gym/gym-img3.jpg" alt=" "></div>
                  </div>
                  <div class="card-head" id="headingTwo">
                    <h2 class="mb-0 collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        <img class="mr-2" src="<?php echo base_url(); ?>assets/img/gym-icon.svg"> Gym
                    </h2>
                  </div>
                  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                    <div class="card-body">
                      Our well-equipped facility is designed to cater to all your workout needs. Discover a wide range of cardio machines, strength-training equipment, and dedicated spaces for functional training.
					  <br><br><h6>Operational hours : 6am – 9pm<h6>
                    </div>
					
                  </div>
                </div>
    
                <div class="card">
                  <!--<div class="img"><img class="mr-2" src="<?php echo base_url(); ?>assets/img/ACEA_Loung_Refurb.jpg"></div>-->
				  <div class="facilitieSlide">
                    <div><img src="<?php echo base_url(); ?>assets/img/daddy_bar/daddy_bar-img1.jpg" alt=" "></div>
                    <div><img src="<?php echo base_url(); ?>assets/img/daddy_bar/daddy_bar-img2.jpg" alt=" "></div>
                    <div><img src="<?php echo base_url(); ?>assets/img/daddy_bar/daddy_bar-img3.jpg" alt=" "></div>
                    <div><img src="<?php echo base_url(); ?>assets/img/daddy_bar/daddy_bar-img4.jpg" alt=" "></div>
                    <div><img src="<?php echo base_url(); ?>assets/img/daddy_bar/daddy_bar-img5.jpg" alt=" "></div>
                  </div>
                  <div class="card-head" id="headingThree">
                    <h2 class="mb-0 collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        <img class="mr-2" src="<?php echo base_url(); ?>assets/img/probyn-bar-icon.svg"> Daddy Probyn Bar
                    </h2>
                  </div>
                  <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                    <div class="card-body">
                      Indulge in the rich ambiance of our Daddy Probyn Bar. Savor fine spirits, crafted cocktails, and delightful conversations. Cheers to unforgettable moments!
                    </div>
                  </div>
                </div>

                <div class="card">
                  <div class="img"><img class="mr-2" src="<?php echo base_url(); ?>assets/img/ACEA_Lounge_Refurb2.jpg"></div>
                  <div class="card-head" id="headingThree">
                    <h2 class="mb-0 collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        <img class="mr-2" src="<?php echo base_url(); ?>assets/img/members-lounge-icon.svg"> Members Lounge
                    </h2>
                  </div>
                  <div id="collapseFour" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                    <div class="card-body">
                     Escape the ordinary and embrace a space tailored to your needs, offering refined elegance and unparalleled service.
                    </div>
                  </div>
                </div>

                <div class="card">
                  <!--<div class="img"><img class="mr-2" src="<?php echo base_url(); ?>assets/img/img1.jpg"></div>-->
				   <div class="facilitieSlide">
						<div><img src="<?php echo base_url(); ?>assets/img/restaurant_deck/restaurant-img1.jpg" alt=" "></div>
						<div><img src="<?php echo base_url(); ?>assets/img/restaurant_deck//restaurant-img2.jpg" alt=" "></div>
						<div><img src="<?php echo base_url(); ?>assets/img/restaurant_deck//restaurant-img3.jpg" alt=" "></div>
						<div><img src="<?php echo base_url(); ?>assets/img/restaurant_deck//restaurant-img4.jpg" alt=" "></div>
						<div><img src="<?php echo base_url(); ?>assets/img/restaurant_deck//restaurant-img5.jpg" alt=" "></div>
						<div><img src="<?php echo base_url(); ?>assets/img/restaurant_deck//restaurant-img6.jpg" alt=" "></div>
						<div><img src="<?php echo base_url(); ?>assets/img/restaurant_deck//restaurant-img7.jpg" alt=" "></div>
						<div><img src="<?php echo base_url(); ?>assets/img/restaurant_deck//restaurant-img8.jpg" alt=" "></div>
					</div>
                  <div class="card-head" id="headingThree">
                    <h2 class="mb-0 collapsed" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                        <img class="mr-2" src="<?php echo base_url(); ?>assets/img/restaurant-deck-icon.svg"> Restaurant Deck & Gardens
                    </h2>
                  </div>
                  <div id="collapseFive" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                    <div class="card-body">
                      Immerse yourself in nature's embrace at our Restaurant Deck and Gardens. Dine al fresco surrounded by lush greenery, creating an enchanting ambiance.
					   <br><br><h6>Operational hours : 6.30am  - 9.30pm<h6>
                    </div>
                  </div>
                </div>
				<div class="card">
                  <!-- <div class="img"><img class="mr-2" src="img/img1.jpg"></div> -->
                  <div class="facilitieSlide">
                    <div><img src="<?php echo base_url(); ?>assets/img/conference/conference-img1.jpg" alt=" "></div>
                    <div><img src="<?php echo base_url(); ?>assets/img/conference/conference-img2.jpg" alt=" "></div>
                    <div><img src="<?php echo base_url(); ?>assets/img/conference/conference-img3.jpg" alt=" "></div>
                    <div><img src="<?php echo base_url(); ?>assets/img/conference/conference-img4.jpg" alt=" "></div>
                  </div>
                  <div class="card-head" id="headingSix">
                    <h2 class="mb-0 collapsed" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                        <img class="mr-2" src="<?php echo base_url(); ?>assets/img/conference/conference-icon.svg"> Conference
                    </h2>
                  </div>
                  <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample">
                    <div class="card-body">
                      Equipped with modern amenities and professional services, the conference room is the perfect space to inspire productivity and success.
                      <br/>
					  <a href="#" class="mt-3" style="color:#2F296D;font-weight: 600; text-decoration: underline;" >Conference Packages</a>
					 <br/>
						<img src="<?php echo base_url(); ?>assets/img/conference/ACEA_Conference_Packages1024_1.jpg" style="width:100%;">
						
                     <!-- <a href="<?php echo base_url(); ?>assets/img/conference/ACEA_Conference_Packages.pdf" target="_blank"  type="application/pdf" class="mt-3" style="color:#2F296D;font-weight: 600;text-decoration: underline;" rel="alternate" media="print">Conference Packages</a>-->
                    </div>
                  </div>
                </div>
				<div class="card">
                  <!-- <div class="img"><img class="mr-2" src="img/img1.jpg"></div> -->
                  <div class="facilitieSlide">
                    <div><img src="<?php echo base_url(); ?>assets/img/food/food-img1.jpg" alt=" "></div>
                    <div><img src="<?php echo base_url(); ?>assets/img/food/food-img2.jpg" alt=" "></div>
                    <div><img src="<?php echo base_url(); ?>assets/img/food/food-img3.jpg" alt=" "></div>
                    <div><img src="<?php echo base_url(); ?>assets/img/food/food-img4.jpg" alt=" "></div>
                    <div><img src="<?php echo base_url(); ?>assets/img/food/food-img5.jpg" alt=" "></div>
                    <div><img src="<?php echo base_url(); ?>assets/img/food/food-img6.jpg" alt=" "></div>
                  </div>
                  <div class="card-head" id="headingSeven">
                    <h2 class="mb-0 collapsed" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                        <img class="mr-2" src="<?php echo base_url(); ?>assets/img/food/food-icon.svg"> Restaurant & Food
                    </h2>
                  </div>
                  <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordionExample">
                    <div class="card-body">
                      Elevate your dining experience at our Restaurant. With a diverse menu of gastronomic delights, impeccable service, and a welcoming atmosphere, every visit is a culinary adventure.<br><br>
					
					<h6> Menu </h6>
					<div id="pdf-container1">
						<iframe src="http://docs.google.com/viewer?url=<?php echo base_url(); ?>assets/menu/print_menu_2023.pdf&embedded=true" frameborder="0" scrolling="no"></iframe>
					</div><br><br>
					
					<!--<div id="pdf-container"></div> <br>
					<button onclick="zoomIn()" id="btn">Zoom +</button>
					<button onclick="zoomOut()" id="btn">Zoom -</button><br><br>-->
				
					<a href="http://docs.google.com/viewer?url=<?php echo base_url(); ?>assets/menu/print_menu_2023.pdf" download>Click here to download menu PDF</a><br><br>
						
					<h6>Operational hours : 6.30am  - 9.30pm<h6> <br>
                    </div>
                  </div>
                </div>
				<div class="card">
                  <!-- <div class="img"><img class="mr-2" src="img/img1.jpg"></div> -->
                  <div class="facilitieSlide">
                    <div><img src="<?php echo base_url(); ?>assets/img/security/screening-img1.jpg" alt=" "></div>
                    <div><img src="<?php echo base_url(); ?>assets/img/security/screening-img2.jpg" alt=" "></div>
                    <div><img src="<?php echo base_url(); ?>assets/img/security/screening-img3.jpg" alt=" "></div>
                    <div><img src="<?php echo base_url(); ?>assets/img/security/screening-img4.jpg" alt=" "></div>
                    <div><img src="<?php echo base_url(); ?>assets/img/security/screening-img5.jpg" alt=" "></div>
                    <div><img src="<?php echo base_url(); ?>assets/img/security/screening-img6.jpg" alt=" "></div>
                    <div><img src="<?php echo base_url(); ?>assets/img/security/screening-img7.jpg" alt=" "></div>
                    <div><img src="<?php echo base_url(); ?>assets/img/security/screening-img8.jpg" alt=" "></div>
                    <!--<div><img src="<?php echo base_url(); ?>assets/img/security/screening-img9.jpg" alt=" "></div>-->
                  </div>
                  <div class="card-head" id="headingEight">
                    <h2 class="mb-0 collapsed" data-toggle="collapse" data-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                        <img class="mr-2" src="<?php echo base_url(); ?>assets/img/security/facilities-icon.svg"> Screening Facility
                    </h2>
                  </div>
                  <div id="collapseEight" class="collapse" aria-labelledby="headingEight" data-parent="#accordionExample">
                    <div class="card-body">
                     Screening Facility
                    </div>
                  </div>
                </div>
    
              </div>
        </div>
        </div>
        </div>
</main>
<?php $this->load->view('front/header/footer'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.9.179/pdf.min.js"></script>
<script>
	// Fetch the PDF file URL using PHP (replace with your URL or file path)
	var pdfUrl = "<?php echo base_url(); ?>assets/menu/print_menu_2023.pdf";
	var scale = 0.8; // Initial scale

	function renderPDF(scale) 
	{
		// Load the PDF using PDF.js
		pdfjsLib.getDocument(pdfUrl).promise.then(function(pdf) {
			var numPages = pdf.numPages;
			var pdfContainer = document.getElementById('pdf-container');
			pdfContainer.innerHTML = ''; // Clear previous content

			// Iterate through each page of the PDF
			for (var pageNumber = 1; pageNumber <= numPages; pageNumber++) 
			{
				pdf.getPage(pageNumber).then(function(page) 
				{
					var viewport = page.getViewport({ scale: scale });
					var canvas = document.createElement('canvas');
					var context = canvas.getContext('2d');
					canvas.height = viewport.height;
					canvas.width = viewport.width;

					var renderContext = {
						canvasContext: context,
						viewport: viewport
					};
					page.render(renderContext);
					pdfContainer.appendChild(canvas);
				});
			}
		});
	}
	function zoomIn() {
		scale += 0.2;
		renderPDF(scale);
	}

	function zoomOut() {
		if (scale > 0.2) {
			scale -= 0.2;
			renderPDF(scale);
		}
	}
	// Initial render
	//renderPDF(scale);
</script>
<style>
 .padTop {
    padding-top: 60px;
}
  #pdf-container 
  {
	overflow: auto; 
  } 
  #pdf-container1 
  {
	overflow: auto; 
	height: 550px; 
	padding: 0 !IMPORTANT;
  }
  #btn
  {
	background-color: #2f296d;
	color: #fff;
	cursor: pointer;
	border-radius: 15px;
	position: relative;
	line-height: 40px;
	border: none;
	font-weight: 600;
	font-size: 18px;
  }
  iframe {
    display: block;       /* iframes are inline by default */
    border: none;         /* Reset default border */
    height: 100vh;        /* Viewport-relative units */
    width: 100vw;
	margin-left: -0px;
}
</style>