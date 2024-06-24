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

?>

        <?php 
            /* echo"--brndID-----".$_SESSION['brndID']."----<br>"; 
            echo"--brndname-----".$_SESSION['brndname']."----<br>"; */
        ?>
		<div class="custom-body">
			<div class="container">
				
				<?php 
				/* if($_SESSION['brndID']==146 || $_SESSION['brndID']==144 || $_SESSION['brndID']==127 ){ ?>
					<br>					
					<br>
				<?php } */ ?>
				<br>


				<a href="http://docs.google.com/gview?embedded=true&url=<?php echo base_url(); ?>assets/brand-<?php echo $_SESSION['brndID']; ?>/menu/food-menu.pdf" id="foodmenu_download" class="download-pdf-link" download>
				
				

					<img src="<?php echo base_url(); ?>assets/brand-<?php echo $_SESSION['brndID']; ?>/images/d-icon.svg"/></a>
					
				<ul class="menu_topbar_tab nav nav-tabs" id="myTab" role="tablist">
					<li class="nav-item">
						<!--<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" aria-selected="true">Food Menu</a>-->
						<input type="button" class="nav-link active" value="Food Menu" id="Foodbtn" onclick = "openfoodMenu()"/>
					</li>
					<li class="nav-item">
						<!--<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" aria-selected="false">Drinks Menu</a>-->
						<input type="button" class="nav-link" value="Drinks Menu" id="Drinkbtn" onclick = "opendrinkMenu()"/>
						
					</li>
				</ul>
				
				
				<!--<div class="tab-content" id="myTabContent">
					 <div class="tab-pane fade show active" id="home">
						<div class="irame-box">

							<iframe  id="foodmenu" src="<?php echo base_url(); ?>assets/brand-<?php echo $_SESSION['brndID']; ?>/menu/food-menu.pdf"></iframe>

							


						</div>
					 </div>
					 <div class="tab-pane fade" id="profile">
						<div class="irame-box">
							<iframe  id="drinkmenu"  src="<?php echo base_url(); ?>assets/brand-<?php echo $_SESSION['brndID']; ?>/menu/drink-menu.pdf"></iframe>
						</div>
					</div>
				</div>-->
				
				<iframe id="FoodFrame" style="display:none" width="315" height="400"></iframe>
				<iframe id="DrinkFrame" style="display:none" width="315" height="400"></iframe>
			
				<div class="ordernow-link">
				
					<a href="9561970954" id="dialer">
						Order Now
						<div class="icon">
							<img src="<?php echo base_url(); ?>assets/brand-<?php echo $_SESSION['brndID']; ?>/images/menu-icon-4.svg"/>
						</div>
					</a>
				</div>
			</div>
		</div>
		
	
	<?php $this->load->view('front/header/footer');  ?>
	<script type="text/javascript">
	
	function openfoodMenu()
	{
		
		$("#Foodbtn").addClass('nav-link active');
		$("#Drinkbtn").removeClass('active');
		
		
		// var DrinkFrame = document.getElementById("DrinkFrame");
		// DrinkFrame.style.display === "none"
		
		
		$("#DrinkFrame").css('display','none');
		
		// $("#drinkmenu_download").css('display','');
		
		document.getElementById("foodmenu_download").href="http://docs.google.com/gview?embedded=true&url=<?php echo base_url(); ?>assets/brand-<?php echo $_SESSION['brndID']; ?>/menu/food-menu.pdf"; 
		
		// $("#drinkmenu_download").css('display','none');
		// $("#foodmenu_download").css('display','');
		
		// alert('openfoodMenu');
		var omyFrame = document.getElementById("FoodFrame");
		
		omyFrame.style.display="block";
		omyFrame.src = "http://docs.google.com/gview?embedded=true&url=<?php echo base_url(); ?>assets/brand-<?php echo $_SESSION['brndID']; ?>/menu/food-menu.pdf";
	}
	function opendrinkMenu()
	{
		
		// var FoodFrame = document.getElementById("FoodFrame");
		// FoodFrame.style.display === "none"
		
		$("#FoodFrame").css('display','none');
		
		document.getElementById("foodmenu_download").href="http://docs.google.com/gview?embedded=true&url=<?php echo base_url(); ?>assets/brand-<?php echo $_SESSION['brndID']; ?>/menu/drink-menu.pdf";
		
		// $("#drinkmenu_download").css('display','');
		// $("#foodmenu_download").css('display','none');
		
		$("#Drinkbtn").addClass('nav-link active');
		$("#Foodbtn").removeClass('active');
		
		// alert('opendrinkMenu');
		var omyFrame = document.getElementById("DrinkFrame");
		omyFrame.style.display="block";
		omyFrame.src = "http://docs.google.com/gview?embedded=true&url=<?php echo base_url(); ?>assets/brand-<?php echo $_SESSION['brndID']; ?>/menu/drink-menu.pdf";
	}

		</script>
	<script>
		$(document).ready(function(){						
			 // $("#Foodbtn").trigger('click');
			 // console.log('onload');
			  // $("#Drinkbtn").trigger('click');
			  
			  openfoodMenu();
		}) 
		
		
   </script>
        
        