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
			
			/* echo"--smartphone_flag-----".$smartphone_flag."----<br>";  */
?>

        <?php 
            /* echo"--brndID-----".$_SESSION['brndID']."----<br>"; 
            echo"--brndname-----".$_SESSION['brndname']."----<br>"; */
        ?>
		<div class="custom-body">
			<div class="container">
				<br>

				<?php  if($smartphone_flag==3) { ?>

						<!--<a href="safari://<?php echo base_url(); ?>assets/brand-<?php echo $_SESSION['brndID']; ?>/menu/food-menu.pdf" class="download-pdf-link" id="foodmenu_download" target="_blank">
						<img src="<?php echo base_url(); ?>assets/brand-<?php echo $_SESSION['brndID']; ?>/images/d-icon.svg"/>
						</a>-->
								
						
						<div class='download-pdf-link' id="foodmenu_download" data-href="<?php echo base_url(); ?>assets/brand-<?php echo $_SESSION['brndID']; ?>/menu/food-menu.pdf">

								<img src="<?php echo base_url(); ?>assets/brand-<?php echo $_SESSION['brndID']; ?>/images/d-icon.svg"/>

						</div>
								
								
				<?php } else if($smartphone_flag==1)  { ?>
				
						<a href="JavaScript:void(0);" id="btnPDF" onclick="getpdfValues();pdf.getDownload(this.value);"  class="download-pdf-link">
						<img src="<?php echo base_url(); ?>assets/brand-<?php echo $_SESSION['brndID']; ?>/images/d-icon.svg"/>
						</a>
						
						<!--<button id="btnPDF" onclick="getpdfValues();pdf.getDownload(this.value);"  class="download-pdf-link" ><img src="<?php echo base_url(); ?>assets/brand-<?php echo $_SESSION['brndID']; ?>/images/d-icon.svg"/> </button>-->
						
					<input type="hidden" name="foodMenu" id="foodMenu" value="<?php echo base_url(); ?>assets/brand-<?php echo $_SESSION['brndID']; ?>/menu/food-menu.pdf">
					<script>
						function getpdfValues() {
							document.getElementById("btnPDF").value = document.getElementById("foodMenu").value;
							return false;
						}
					</script>
				
				<?php } ?>
				
				
				
				
				
				
				
								
					
				<ul class="menu_topbar_tab nav nav-tabs" id="myTab" role="tablist">
					<?php if($_SESSION['brndID'] == 125 || $_SESSION['brndID'] == 144) { ?> <!---Ohcha Noodle Bar-->
					<li class="nav-item">
						<input type="button" class="nav-link active" value="Menu" id="Foodbtn" onclick = "openfoodMenu()"/>
					</li>
					<?php } else { ?>
					
					<li class="nav-item" style="width:100px;">
						<input type="button" class="nav-link active" value="Food Menu" id="Foodbtn" onclick = "openfoodMenu()"/>
						<?php if($smartphone_flag==2) { ?>
							<div class='download-pdf-link' id="foodmenu_download" style="margin-top: -22px;"  data-href="<?php echo base_url(); ?>assets/brand-<?php echo $_SESSION['brndID']; ?>/menu/food-menu.pdf">

									<img src="<?php echo base_url(); ?>assets/brand-<?php echo $_SESSION['brndID']; ?>/images/d-icon.svg"/>

							</div>
						<?php } ?>
						
						
					</li>
					<li class="nav-item" style="width:120px;">
						<input type="button" class="nav-link" value="Drinks Menu" id="Drinkbtn" onclick = "opendrinkMenu()"/>
						
						<?php if($smartphone_flag==2) { ?>
							
							<div class='download-pdf-link' id="foodmenu_download" style="margin-top: -22px;" data-href="<?php echo base_url(); ?>assets/brand-<?php echo $_SESSION['brndID']; ?>/menu/drink-menu.pdf">

									<img src="<?php echo base_url(); ?>assets/brand-<?php echo $_SESSION['brndID']; ?>/images/d-icon.svg"/>

							</div>
						<?php } ?>
						
					</li>
					<?php } ?>
				</ul>
				
				
				
				
				<iframe id="FoodFrame" style="display:none" width="315" height="400"></iframe>
				<iframe id="DrinkFrame" style="display:none" width="315" height="400"></iframe>
			
				
				
				<div class="ordernow-link">
					
					
					
					
					<?php
						// echo"<br>---Brand_phone-----".$Brand_phone;
						$Brand_phone="254709828282";
						$bandPhoneNo = sprintf("%s-%s-%s-%s",substr($Brand_phone, 0, 3),substr($Brand_phone, 3, 3),substr($Brand_phone, 6, 3),substr($Brand_phone, 9, 3));
						// echo"<br>---bandPhoneNo-----".$bandPhoneNo;

					?>
				
					
					
					<?php if($smartphone_flag==2) { /*iOS*/ ?>
					
						<!--<a href="tel:+<?php echo $bandPhoneNo; ?>">-->
						
						<a href="tel://<?php echo $Brand_phone; ?>">
							Order Now
							<div class="icon">
								<img src="<?php echo base_url(); ?>assets/brand-<?php echo $_SESSION['brndID']; ?>/images/menu-icon-4.svg"/>
							</div>
						</a>
						
					<?php } else { ?>
					
					
							<input type="hidden" name="fname" id="txtfname" value="+<?php echo $bandPhoneNo; ?>">

							<script>
								function getValues() {
									document.getElementById("btnOK").value = document.getElementById("txtfname").value;
								}
							</script>
					
							<a href="JavaScript:void(0)" id="btnOK" onclick="getValues();ok.performClick(this.value);">
								Order Now
								<div class="icon">
									<img src="<?php echo base_url(); ?>assets/brand-<?php echo $_SESSION['brndID']; ?>/images/menu-icon-4.svg"/>
								</div>
							</a>
					<?php }  ?>
					
				</div>
			</div>
		</div>
	
	
	<?php $this->load->view('front/header/footer');  ?>
	
	<script language="javascript">

	   function validClick()
	   {
		  valid.performClick();
		  document.getElementById("ok").value = "J'accepte";
	   }
	   function refuseClick()
	   {
		  refuse.performClick();
		  document.getElementById("no").value = "Je refuse";
	   }
	</script>



	<script type="text/javascript">
	var smartphone_flag=<?php echo $smartphone_flag; ?>;
	function openfoodMenu()
	{
		
		$("#Foodbtn").addClass('nav-link active');
		$("#Drinkbtn").removeClass('active');
		
		
		
		$("#DrinkFrame").css('display','none');
		
		/* if(smartphone_flag==2){
			
			
			
			var MenuVal12="<?php echo base_url(); ?>assets/brand-<?php echo $_SESSION['brndID']; ?>/menu/food-menu.pdf";
			
			document.getElementById("foodmenu_download").setAttribute("data-href", MenuVal12);
			
			
			
			
			// document.getElementById("foodmenu_download").href="<?php echo base_url(); ?>assets/brand-<?php echo $_SESSION['brndID']; ?>/menu/food-menu.pdf"; 
		} */
		
		if(smartphone_flag==1){
			document.getElementById("foodMenu").value="<?php echo base_url(); ?>assets/brand-<?php echo $_SESSION['brndID']; ?>/menu/food-menu.pdf";
		}
		
		var omyFrame = document.getElementById("FoodFrame");
		
		omyFrame.style.display="block";
		omyFrame.src = "http://docs.google.com/gview?embedded=true&url=<?php echo base_url(); ?>assets/brand-<?php echo $_SESSION['brndID']; ?>/menu/food-menu.pdf";
	}
	function opendrinkMenu()
	{
		
		$("#FoodFrame").css('display','none');
		
		/* if(smartphone_flag==2){
			
			
			
			var MenuVal="<?php echo base_url(); ?>assets/brand-<?php echo $_SESSION['brndID']; ?>/menu/drink-menu.pdf";
			
			document.getElementById("foodmenu_download").setAttribute("data-href", MenuVal);
			
			// document.getElementById("foodmenu_download").href="<?php echo base_url(); ?>assets/brand-<?php echo $_SESSION['brndID']; ?>/menu/drink-menu.pdf";
		} */
		
		
		if(smartphone_flag==1){
			
			document.getElementById("foodMenu").value="<?php echo base_url(); ?>assets/brand-<?php echo $_SESSION['brndID']; ?>/menu/drink-menu.pdf";
		}
		
		
		
		
		
		$("#Drinkbtn").addClass('nav-link active');
		$("#Foodbtn").removeClass('active');
		
		
		var omyFrame = document.getElementById("DrinkFrame");
		omyFrame.style.display="block";
		omyFrame.src = "http://docs.google.com/gview?embedded=true&url=<?php echo base_url(); ?>assets/brand-<?php echo $_SESSION['brndID']; ?>/menu/drink-menu.pdf";
	}

		</script>
	<script>
		$(document).ready(function(){
			  
			  openfoodMenu();
		}) 
		
		
		$(document).on('click', '.download-pdf-link', function() {

			document.location = $(this).data('href');

		});
		
		
   </script>
        
        