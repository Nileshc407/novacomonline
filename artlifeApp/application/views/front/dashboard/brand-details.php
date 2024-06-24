<?php 

    $this->load->view('front/header/header'); 

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
		$Photograph=base_url()."assets/img/profile.png";
		
	} else {
		
		$Photograph=$this->config->item('base_url2').$Photograph;
		
	}
	$session_data = $this->session->userdata('cust_logged_in');
	$smartphone_flag = $session_data['smartphone_flag'];
	
	
	// echo"--view-----".$_REQUEST['view']."----<br>"; 
	if($_REQUEST['view']==1){
		
		$viewclass='collapse show';
		
	} else {
		
		$viewclass='collapse';
	}
// echo"--viewclass-----".$viewclass."----<br>"; 
	
	
            /* echo"--brndID-----".$_SESSION['brndID']."----<br>"; 
            echo"--brndname-----".$_SESSION['brndname']."----<br>"; */
        ?>  

		<?php /* if($_SESSION['brndID'] != 127) { 
		
			if($smartphone_flag==3) { ?>
				<div class='download-pdf-link' id="foodmenu_download" data-href="<?php echo base_url(); ?>assets/brand-<?php echo $_SESSION['brndID']; ?>/menu/food-menu.pdf">
					<img src="<?php echo base_url(); ?>assets/brand-<?php echo $_SESSION['brndID']; ?>/images/d-icon.svg"/>
				</div>					
			<?php } else if($smartphone_flag==1)  { ?>
			
					<a href="JavaScript:void(0);" id="btnPDF" onclick="getpdfValues();pdf.getDownload(this.value);"  class="download-pdf-link">
					<img src="<?php echo base_url(); ?>assets/brand-<?php echo $_SESSION['brndID']; ?>/images/d-icon.svg"/>
					</a>
					<input type="hidden" name="foodMenu" id="foodMenu" value="<?php echo base_url(); ?>assets/brand-<?php echo $_SESSION['brndID']; ?>/menu/food-menu.pdf">
					<script>
						function getpdfValues() {
							document.getElementById("btnPDF").value = document.getElementById("foodMenu").value;
							return false;
						}
					</script>					
				<?php }
			}  */
		?>
			
		<div class="custom-body">
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
			<div class="view-wrap brand-details">
			
			
			<?php 
			
				$Brand_phone="254709828282";
				$bandPhoneNo = sprintf("%s-%s-%s-%s",substr($Brand_phone, 0, 3),substr($Brand_phone, 3, 3),substr($Brand_phone, 6, 3),substr($Brand_phone, 9, 3));

			?>
			
			<?php if($_SESSION['brndID'] == 11) { ?>
			
			
				<a href="<?php echo base_url(); ?>index.php/Cust_home/onlineorder?url=https://www.artcaffe.co.ke/order" >
					<div class="item">
						Order Online
						
						<div class="icon">
							<img src="<?php echo base_url(); ?>assets/brand-0/images/Mouse-Cursor-Magnolia.svg"/>
						</div>
					</div>
				</a>
			
				<?php if($smartphone_flag==2) { /*iOS*/ ?>
					
					
						<a href="tel://<?php echo $Brand_phone; ?>">
							<div class="item item-odd">
								Call to Order
								<div class="icon">
									<img src="<?php echo base_url(); ?>assets/brand-0/images/Telephone-Magnolia.svg"/>
								</div>
							</div>
						</a>
						
						
					<?php } else { ?>
					
							<input type="hidden" name="phoneno" id="phoneno" value="+<?php echo $bandPhoneNo; ?>">

								<script>
									function getValues() {
										document.getElementById("btnOK").value = document.getElementById("phoneno").value;
									}
								</script>
						
								<a href="JavaScript:void(0)" id="btnOK" onclick="getValues();ok.performClick(this.value);">
									<div class="item item-odd">
										Call to Order
										
										<div class="icon">
											<img src="<?php echo base_url(); ?>assets/brand-0/images/Telephone-Magnolia.svg"/>
										</div>
									</div>
								</a>
					<?php }  ?>
					
					<!--<a href="https://www.artcaffe.co.ke/special-offers">
						<div class="item">
							Special Offers
							
							<div class="icon">
								<img src="<?php echo base_url(); ?>assets/brand-0/images/Megaphone-Magnolia.svg"/>
							</div>
						</div>
					</a>-->
					
					
					<div class="accordion-card">
						<div class="accordion-in" id="accordion-main">
							<div class="card">
								<div class="card-header" id="accordion1" >
									<a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#accord1" aria-expanded="true" aria-controls="accord1" style="background-color:var(--dark);">Special Offers</a>
								</div>
								<div id="accord1" class="<?php echo $viewclass; ?>" aria-labelledby="accordion1" data-parent="#accordion-main">
								
							
										<div class="card-body p-0">
																							
													<div class="item brand">
														
														<img src="<?php echo base_url(); ?>assets/brand-<?php echo $_SESSION['brndID']; ?>/images/banner-1.jpg"/>
													</div>
													<div class="item brand">
														
														<img src="<?php echo base_url(); ?>assets/brand-<?php echo $_SESSION['brndID']; ?>/images/banner-2.jpg"/>
													</div>
													<div class="item brand">
														
														<img src="<?php echo base_url(); ?>assets/brand-<?php echo $_SESSION['brndID']; ?>/images/banner-3.jpg"/>
													</div>
												
											
										</div>
									 
								</div>
							</div>
						</div>
					</div>
					
					
					
					
					
					<a href="<?php echo base_url(); ?>index.php/Cust_home/aboutus?url=https://www.artcaffe.co.ke/about/our-story">
						<div class="item item-odd">
								About Us
							
							<div class="icon">
								<img src="<?php echo base_url(); ?>assets/brand-0/images/Megaphone-Magnolia.svg"/>
							</div>
						</div>
					</a>
					<a href="<?php echo base_url(); ?>index.php/Cust_home/contact">
						<div class="item">
								Contact Us
							
							<div class="icon">
								<img src="<?php echo base_url(); ?>assets/brand-0/images/Megaphone-Magnolia.svg"/>
							</div>
						</div>
					</a>
					
							
			<?php } ?>
			<?php if($_SESSION['brndID'] == 121) { ?>
			
					<a href="<?php echo base_url(); ?>index.php/Cust_home/onlineorder?url=https://artcaffe.dpo.store/store">
						<div class="item">
							Shop Now &nbsp;&nbsp;
							<div class="icon">
								&nbsp;<img src="<?php echo base_url(); ?>assets/brand-0/images/Mouse-Cursor-Magnolia.svg"/>
							</div>
						</div>
					</a>
					<!--<a href="https://artcaffe.dpo.store/store">
						<div class="item item-even">
							Special Offers
							
							<div class="icon">
								<img src="<?php echo base_url(); ?>assets/brand-0/images/Megaphone-Magnolia.svg"/>
							</div>
						</div>
					</a>-->
					
					<div class="accordion-card">
						<div class="accordion-in" id="accordion-main">
							<div class="card">
								<div class="card-header" id="accordion1" >
									<a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#accord1" aria-expanded="true" aria-controls="accord1" style="background-color:var(--dark);">Special Offers</a>
								</div>
								<div id="accord1" class="<?php echo $viewclass; ?>" aria-labelledby="accordion1" data-parent="#accordion-main">
								
							
										<div class="card-body p-0">
																							
													<div class="item brand">
														
														<img src="<?php echo base_url(); ?>assets/brand-<?php echo $_SESSION['brndID']; ?>/images/banner-1.jpg"/>
													</div>
													<div class="item brand">
														
														<img src="<?php echo base_url(); ?>assets/brand-<?php echo $_SESSION['brndID']; ?>/images/banner-2.jpg"/>
													</div>
													<div class="item brand">
														
														<img src="<?php echo base_url(); ?>assets/brand-<?php echo $_SESSION['brndID']; ?>/images/banner-3.jpg"/>
													</div>
												
											
										</div>
									 
								</div>
							</div>
						</div>
					</div>
					<a href="<?php echo base_url(); ?>index.php/Cust_home/aboutus?url=https://artcaffe.dpo.store/services">
						<div class="item">
								About Us
							
							<div class="icon">
								<img src="<?php echo base_url(); ?>assets/brand-0/images/Megaphone-Magnolia.svg"/>
							</div>
						</div>
					</a>
					<a href="<?php echo base_url(); ?>index.php/Cust_home/contact">
						<div class="item item-even">
								Contact Us
							
							<div class="icon">
								<img src="<?php echo base_url(); ?>assets/brand-0/images/Megaphone-Magnolia.svg"/>
							</div>
						</div>
					</a>
			
			<?php } ?>
			
			
							
							
			<?php if($_SESSION['brndID'] == 123) { ?>
			
				<a href="<?php echo base_url(); ?>index.php/Cust_home/onlineorder?url=https://www.urbanburgers.co.ke/urban-order" >
					<div class="item">
						Order Online
						
						<div class="icon">
							<img src="<?php echo base_url(); ?>assets/brand-0/images/Mouse-Cursor-Magnolia.svg"/>
						</div>
					</div>
				</a>
			
				<?php if($smartphone_flag==2) { /*iOS*/ ?>
					
					
						<a href="tel://<?php echo $Brand_phone; ?>">
							<div class="item item-odd">
								Call to Order
								<div class="icon">
									<img src="<?php echo base_url(); ?>assets/brand-0/images/Telephone-Magnolia.svg"/>
								</div>
							</div>
						</a>
						
						
					<?php } else { ?>
					
							<input type="hidden" name="phoneno" id="phoneno" value="+<?php echo $bandPhoneNo; ?>">

								<script>
									function getValues() {
										document.getElementById("btnOK").value = document.getElementById("phoneno").value;
									}
								</script>
						
								<a href="JavaScript:void(0)" id="btnOK" onclick="getValues();ok.performClick(this.value);">
									<div class="item item-odd">
										Call to Order
										
										<div class="icon">
											<img src="<?php echo base_url(); ?>assets/brand-0/images/Telephone-Magnolia.svg"/>
										</div>
									</div>
								</a>
					<?php }  ?>
					<!--<a href="https://www.urbanburgers.co.ke/special-offers">
						<div class="item">
							Special Offers
							
							<div class="icon">
								<img src="<?php echo base_url(); ?>assets/brand-0/images/Megaphone-Magnolia.svg"/>
							</div>
						</div>
					</a>-->
					<div class="accordion-card">
						<div class="accordion-in" id="accordion-main">
							<div class="card">
								<div class="card-header" id="accordion1" >
									<a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#accord1" aria-expanded="true" aria-controls="accord1" style="background-color:var(--primary);">Special Offers</a>
								</div>
								<div id="accord1" class="<?php echo $viewclass; ?>" aria-labelledby="accordion1" data-parent="#accordion-main">
								
							
										<div class="card-body p-0">
																							
													<div class="item brand">
														
														<img src="<?php echo base_url(); ?>assets/brand-<?php echo $_SESSION['brndID']; ?>/images/banner-1.jpg"/>
													</div>
													<div class="item brand">
														
														<img src="<?php echo base_url(); ?>assets/brand-<?php echo $_SESSION['brndID']; ?>/images/banner-2.jpg"/>
													</div>
													<div class="item brand">
														
														<img src="<?php echo base_url(); ?>assets/brand-<?php echo $_SESSION['brndID']; ?>/images/banner-3.jpg"/>
													</div>
												
											
										</div>
									 
								</div>
							</div>
						</div>
					</div>
					<a href="<?php echo base_url(); ?>index.php/Cust_home/aboutus?url=https://www.urbanburgers.co.ke/about-urbanburger">
						<div class="item item-odd">
								About Us
							
							<div class="icon">
								<img src="<?php echo base_url(); ?>assets/brand-0/images/Megaphone-Magnolia.svg"/>
							</div>
						</div>
					</a>
					<a href="<?php echo base_url(); ?>index.php/Cust_home/contact">
						<div class="item">
								Contact Us
							
							<div class="icon">
								<img src="<?php echo base_url(); ?>assets/brand-0/images/Megaphone-Magnolia.svg"/>
							</div>
						</div>
					</a>
			
			<?php } ?>
			
			
			<?php if($_SESSION['brndID'] == 125) { ?>
			
			
				<a href="<?php echo base_url(); ?>index.php/Cust_home/onlineorder?url=https://www.ohcha.co.ke/ohcha-order" >
					<div class="item">
						Order Online
						
						<div class="icon">
							<img src="<?php echo base_url(); ?>assets/brand-0/images/Mouse-Cursor-Magnolia.svg"/>
						</div>
					</div>
				</a>
			
				<?php if($smartphone_flag==2) { /*iOS*/ ?>
					
					
						<a href="tel://<?php echo $Brand_phone; ?>">
							<div class="item item-odd">
								Call to Order
								<div class="icon">
									<img src="<?php echo base_url(); ?>assets/brand-0/images/Telephone-Magnolia.svg"/>
								</div>
							</div>
						</a>
						
						
					<?php } else { ?>
					
							<input type="hidden" name="phoneno" id="phoneno" value="+<?php echo $bandPhoneNo; ?>">

								<script>
									function getValues() {
										document.getElementById("btnOK").value = document.getElementById("phoneno").value;
									}
								</script>
						
								<a href="JavaScript:void(0)" id="btnOK" onclick="getValues();ok.performClick(this.value);">
									<div class="item item-odd">
										Call to Order
										
										<div class="icon">
											<img src="<?php echo base_url(); ?>assets/brand-0/images/Telephone-Magnolia.svg"/>
										</div>
									</div>
								</a> 
					<?php }  ?>
			
					<!--<a href="https://www.ohcha.co.ke/ohcha-special-offers">
						<div class="item"  style="background: #0eb776;">
							Special Offers
							
							<div class="icon">
								<img src="<?php echo base_url(); ?>assets/brand-0/images/Megaphone-Magnolia.svg"/>
							</div>
						</div>
					</a>-->
					<div class="accordion-card">
						<div class="accordion-in" id="accordion-main">
							<div class="card">
								<div class="card-header" id="accordion1" >
									<a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#accord1" aria-expanded="true" aria-controls="accord1" style="background-color:var(--primary);">Special Offers</a>
								</div>
								<div id="accord1" class="<?php echo $viewclass; ?>" aria-labelledby="accordion1" data-parent="#accordion-main">
								
							
										<div class="card-body p-0">
																							
													<div class="item brand">
														
														<img src="<?php echo base_url(); ?>assets/brand-<?php echo $_SESSION['brndID']; ?>/images/banner-1.jpg"/>
													</div>
													<div class="item brand">
														
														<img src="<?php echo base_url(); ?>assets/brand-<?php echo $_SESSION['brndID']; ?>/images/banner-2.jpg"/>
													</div>
													<div class="item brand">
														
														<img src="<?php echo base_url(); ?>assets/brand-<?php echo $_SESSION['brndID']; ?>/images/banner-3.jpg"/>
													</div>
												
											
										</div>
									 
								</div>
							</div>
						</div>
					</div>
					<a href="<?php echo base_url(); ?>index.php/Cust_home/aboutus?url=https://www.ohcha.co.ke/about-ohcha">
						<div class="item item-odd">
								About Us
							
							<div class="icon">
								<img src="<?php echo base_url(); ?>assets/brand-0/images/Megaphone-Magnolia.svg"/>
							</div>
						</div>
					</a>
					<a href="<?php echo base_url(); ?>index.php/Cust_home/contact">
						<div class="item">
								Contact Us
							
							<div class="icon">
								<img src="<?php echo base_url(); ?>assets/brand-0/images/Megaphone-Magnolia.svg"/>
							</div>
						</div>
					</a>
			
			<?php }  ?>
			<?php if($_SESSION['brndID'] == 127) { ?>	

				<a href="<?php echo base_url(); ?>index.php/Cust_home/onlineorder?url=http://tapas.co.ke/index.php/menu/" >
					<div class="item item-odd">
						Menu
						
						<div class="icon">
							<img src="<?php echo base_url(); ?>assets/brand-0/images/Mouse-Cursor-Magnolia.svg"/>
						</div>
					</div>
				</a>
				<input type="hidden" name="phoneno" id="phoneno" value="+<?php echo $bandPhoneNo; ?>">

					<script>
						function getValues() {
							document.getElementById("btnOK").value = document.getElementById("phoneno").value;
						}
					</script>
			
					<a href="JavaScript:void(0)" id="btnOK" onclick="getValues();ok.performClick(this.value);">
						<div class="item item-even">
							Make a Reservation										
							<div class="icon">
								<img src="<?php echo base_url(); ?>assets/brand-0/images/Telephone-Magnolia.svg"/>
							</div>
						</div>
					</a>	
					<!--<a href="http://tapas.co.ke/index.php/menu/">
						<div class="item item-even">
							Special Offers							
							<div class="icon">
								<img src="<?php echo base_url(); ?>assets/brand-0/images/Megaphone-Magnolia.svg"/>
							</div>
						</div>
					</a>-->	
					<div class="accordion-card">
						<div class="accordion-in" id="accordion-main">
							<div class="card">
								<div class="card-header" id="accordion1" >
									<a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#accord1" aria-expanded="true" aria-controls="accord1" style="background-color:var(--primary);">Special Offers</a>
								</div>
								<div id="accord1" class="<?php echo $viewclass; ?>" aria-labelledby="accordion1" data-parent="#accordion-main">
								
							
										<div class="card-body p-0">
																							
													<div class="item brand">
														
														<img src="<?php echo base_url(); ?>assets/brand-<?php echo $_SESSION['brndID']; ?>/images/banner-1.jpg"/>
													</div>
													<div class="item brand">
														
														<img src="<?php echo base_url(); ?>assets/brand-<?php echo $_SESSION['brndID']; ?>/images/banner-2.jpg"/>
													</div>
													<div class="item brand">
														
														<img src="<?php echo base_url(); ?>assets/brand-<?php echo $_SESSION['brndID']; ?>/images/banner-3.jpg"/>
													</div>
												
											
										</div>
									 
								</div>
							</div>
						</div>
					</div>
					<a href="<?php echo base_url(); ?>index.php/Cust_home/aboutus?url=http://tapas.co.ke/index.php/about/">
						<div class="item item-even">
								About Us
							
							<div class="icon">
								<img src="<?php echo base_url(); ?>assets/brand-0/images/Megaphone-Magnolia.svg"/>
							</div>
						</div>
					</a>
					<a href="<?php echo base_url(); ?>index.php/Cust_home/contact">
						<div class="item item-odd">
								Contact Us
							
							<div class="icon">
								<img src="<?php echo base_url(); ?>assets/brand-0/images/Megaphone-Magnolia.svg"/>
							</div>
						</div>
					</a>
			
			<?php } ?>
			
			
			
			
			
			
			
				
				
			<?php 
			/********* Start Comment   *
				$Brand_phone="254709828282";
				$bandPhoneNo = sprintf("%s-%s-%s-%s",substr($Brand_phone, 0, 3),substr($Brand_phone, 3, 3),substr($Brand_phone, 6, 3),substr($Brand_phone, 9, 3));

			?>
				<?php if($_SESSION['brndID'] != 121) { ?>
				
					<?php if($smartphone_flag==2) { /*iOS****** ?>
					
					
						<a href="tel://<?php echo $Brand_phone; ?>">
							<div class="item item-odd">
								Call to Order
								<div class="icon">
									<img src="<?php echo base_url(); ?>assets/brand-0/images/Telephone-Magnolia.svg"/>
								</div>
							</div>
						</a>
						
						
					<?php } else { ?>
					
							<input type="hidden" name="phoneno" id="phoneno" value="+<?php echo $bandPhoneNo; ?>">

								<script>
									function getValues() {
										document.getElementById("btnOK").value = document.getElementById("phoneno").value;
									}
								</script>
						
								<a href="JavaScript:void(0)" id="btnOK" onclick="getValues();ok.performClick(this.value);">
									<div class="item item-odd">
										<?php if($_SESSION['brndID'] == 127){
											echo "Make a reservation";
										} else {
											echo "Call to Order";
										} ?>
										
										<div class="icon">
											<img src="<?php echo base_url(); ?>assets/brand-0/images/Telephone-Magnolia.svg"/>
										</div>
									</div>
								</a>
					<?php }  ?>
					
				<?php }  ?>
				
				
				<?php if($_SESSION['brndID'] != 127) { ?>
				
					<?php if($_SESSION['brndID']== 121){ ?>
						<a href="https://artcaffe.dpo.store/store">
							<div class="item">
								Shop Now &nbsp;&nbsp;
								<div class="icon">
									&nbsp;<img src="<?php echo base_url(); ?>assets/brand-0/images/Mouse-Cursor-Magnolia.svg"/>
								</div>
							</div>
						</a>
					<?php } else { ?>					
					
					<?php
								
						if($_SESSION['brndID'] == 11 ) {
							$OrderOnlineUrl="https://www.artcaffe.co.ke/order";
						} else if($_SESSION['brndID'] == 123 ) {
							$OrderOnlineUrl="https://www.urbanburgers.co.ke/urban-order";
						} else if($_SESSION['brndID'] == 125 ) {
							$OrderOnlineUrl="https://www.ohcha.co.ke/ohcha-order";
						} else if($_SESSION['brndID'] == 127 ) {
							$OrderOnlineUrl="http://tapas.co.ke/index.php/menu/";
						} else if($_SESSION['brndID'] == 121 ) {
							$OrderOnlineUrl="https://artcaffe.dpo.store/store";
						}
						
					?>
					
					<a href="<?php echo $OrderOnlineUrl; ?>" onclick="return goTourl('<?php echo $OrderOnlineUrl; ?>');">
						<div class="item">
							Order Online
							
							<div class="icon">
								<img src="<?php echo base_url(); ?>assets/brand-0/images/Mouse-Cursor-Magnolia.svg"/>
							</div>
						</div>
					</a>
					<?php }  ?>
				
				
				<?php }



				 End Comment ********/
				?>
				
				
					
					
				
				<!--<?php //echo base_url(); ?>index.php/Cust_home/brand_new-->
				<?php 
					if($_SESSION['brndID']== 11){
						$Buy_Gift_Cards_url="JavaScript:void(0);";
					}  else if($_SESSION['brndID']== 121){
						$Buy_Gift_Cards_url="JavaScript:void(0);";
					} else if($_SESSION['brndID']== 125){
						$Buy_Gift_Cards_url="JavaScript:void(0);";
					} else if($_SESSION['brndID']== 127){
						$Buy_Gift_Cards_url="JavaScript:void(0);"; 
					} else  {
						$Buy_Gift_Cards_url="JavaScript:void(0);";
					}
				?>
				<!--<a href="<?php echo $Buy_Gift_Cards_url; ?>">
					<div class="item">
						Buy Gift Cards
						<div class="icon">
							<img src="<?php echo base_url(); ?>assets/brand-<?php echo $_SESSION['brndID']; ?>/images/menu-icon-3.svg"/>
						</div>
					</div>
				</a>-->
			</div>
		</div>
	<?php $this->load->view('front/header/footer');  ?>
	<script>
		function goTourl(url){
			window.location.href = url;
		}
	</script>
	
	<script>
		

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
   <style>
	.item:after{
		border:none !IMPORTANT;
	}
   </style>
        